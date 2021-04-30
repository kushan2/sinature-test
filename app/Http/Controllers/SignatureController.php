<?php
/**
 *
 */
namespace App\Http\Controllers;

use App\Models\Signature;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class SignatureController extends BaseController
{
    /**
     * @var Signature
     */
    private $signature;

    public function __construct()
    {
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home()
    {
        $records = Signature::get();
        return view('user.home',compact('records'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        return $this->createOrUpdate($request);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit($id)
    {
        $records = Signature::get();

        try{
            $signature = Signature::where('id', $id)->firstOrFail();
            return view('user.home',compact('records', 'signature'));
        }catch (\Exception $exception){
            return Redirect::back()->withErrors($exception->getMessage());
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        try{
            $signature = Signature::where('id', $id)->firstOrFail();
            $signature->delete();
            return Redirect::back()->with('success', 'Deleted!');
        }catch (\Exception $exception){
            return Redirect::back()->withErrors($exception->getMessage());
        }
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, Request $request)
    {
        return $this->createOrUpdate($request, $id);
    }

    /**
     * @param $request
     * @param null $id
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function createOrUpdate($request, $id = null)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'title' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|max:20',
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'logo_image' => 'mimes:jpeg,jpg,png,gif|max:10000'
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator->errors()->first())->withInput($request->input());
        }

        try{
            $logo_image_path = $profile_image_path = '';
            $updateData = [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'title' => $request->title,
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address,
                'linkedin_url' => $request->linkedin_url,
            ];

            if(isset($request->profile_image)){
                $profile_image = 'profile_'.date('mdYHis') . uniqid(). '_' .$request->profile_image->getClientOriginalName();
                $request->profile_image->storeAs('public/images', $profile_image);
                $updateData['profile_image_path'] = '/images/'.$profile_image;
            }

            if(isset($request->logo_image)){
                $logo_image = 'logo_'.date('mdYHis') . uniqid().$request->logo_image->getClientOriginalName();
                $request->logo_image->storeAs('public/images', $logo_image);
                $updateData['logo_path'] = '/images/'.$logo_image;
            }

            $sig = Signature::updateOrCreate(
                [
                    'id' => $id
                ],
                $updateData
            );

            if(isset($request->preview)){
                return Redirect::to('/edit/'.$sig->id.'/preview')->withInput($request->input());
            }
            return Redirect::to('/')->with('success', 'Updated!');
        }catch (\Exception $exception){
            return Redirect::back()->withErrors($exception->getMessage());
        }
    }

    public function preview($id)
    {
        try{
            $signature = Signature::where('id', $id)->firstOrFail();
            $records = Signature::get();
            $preview = view('partial.preview', compact('signature'))->render();
            return view('user.home',compact('preview', 'records', 'signature'));
        }catch (\Exception $exception){
            return Redirect::back()->withErrors($exception->getMessage());
        }
    }
}
