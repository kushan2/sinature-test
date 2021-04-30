<table cellpadding="0" bgcolor="#fff" cellspacing="0" width="550"style="550px">
    <tr>
        <td width="85" style="padding:10px">
            <a href="{{$signature->linkedin_url}}" target="new" style="text-decoration:none;color:#3A3A3C">
                @if(!empty($signature->profile_image_path))
                    <img src="{{url('/storage'.$signature->profile_image_path)}}" width="85" style="width:85px;display:block">
                @endif </a>
        </td>
        <td width="50%" height="0" style="font-family:Calibri,sans-serif;line-height:16px;padding-left:5px;padding-right:5px;padding-bottom:px ">
            <table width="100%" border="0" style="font-family:Calibri,sans-serif;font-size:11pt;line-height:16px;margin:0px">
                <tr>
                    <td colspan="3"><b style="font-size:14pt;color:#666666">{{$signature->first_name.' '.$signature->last_name}}</b></td>
                </tr>
                <tr>
                    <td colspan="3"> <b style="font-size:12pt;color:#2275B4">{{$signature->title}}</b></td>
                </tr>
                <tr>
                    <td><b style="text-decoration:none;color:#666666">P :</b> <a href="tel:{{$signature->phone}}" target="new" style="text-decoration:none;color:#999999"> {{$signature->phone}}</a></td>
                    <td>|</td>
                    <td><b style="text-decoration:none;color:#666666">O :</b><a href="tel:866.310.4923" target="new" style="text-decoration:none;color:#999999"> 866.310.4923</a></td>

                </tr>
                <tr>
                    <td><a href="mailto:{{$signature->email}}" target="new" style="text-decoration:none;color:#999999">{{$signature->email}}</a></td>
                    <td>|</td>
                    <td><a href="https://www.mvix.com/" target="new" style="text-decoration:none;color:#999999">www.mvix.com</a></td>
                </tr>
                <tr>
                    <td colspan="3"><a href="https://www.mvix.com/" target="new" style="font-size:8pt;text-decoration:none;color:#999999">{{$signature->address}}</a>
                    </td>
                </tr>
            </table>
        </td>
        <td width="5" style="padding-right: 5px">
            <img src="https://s20.postimg.cc/jte1f5i0t/border.png" width="1.8" style="width:1.8px">
            </a>
        </td>
        <td width="100" style="padding-left:0px;text-align:center">
            <a href="http://www.mvix.com/" target="new" style="text-decoration:none;color:#000">
                @if(!empty($signature->logo_path))
                    <img src="{{url('/storage'.$signature->logo_path)}}" width="85" style="width:85px;display:block">
                @else
                    <img src="http://www.mvixusa.com/wp-content/uploads/2016/08/mvix_logo.png" width="100" style="width:130px;">
                @endif
            </a>
        </td>
    </tr>
</table>
<table cellpadding="0" bgcolor="#011875" cellspacing="0" width="550" height="35" style="border-top:4px solid#2275B4">
    <tr>
        <td style="background-color: #999999;font-family:roboto,sans-serif;text-align:center;font-size:10px;vertical-align:center">
            <a href="https://www.mvix.com" target="new" style="text-align:center;font-size:10pt; padding:7px; text-decoration:none;color:#ffffff">End-to-End Digital Signage Solutions  | Powering 60K+ screens since 2005</a></td>
    </tr>
</table>
