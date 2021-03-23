
<table>
    <tr>
        <td>
            <a href="#"
               data-id="{{!empty($data->id) ? $data->id : ''}}"
               data-name="{{!empty($data->name) ? $data->name : ''}}"
               data-unit_role="{{!empty($data->SuperAdminRole->name) ? $data->SuperAdminRole->name : ''}}"
               data-email="{{!empty($data->email) ? $data->email : ''}}"
               data-phone="{{!empty($data->phone) ? $data->phone : ''}}"

               class="btn btn-info view-data"
               data-toggle="modal" data-target="#viewmodal">View
            </a>
        </td>
        <td><a href="#" class="btn btn-success edit-data"
               data-toggle="modal" data-target="#editmodal"
               data-id="{{!empty($data->id) ? $data->id : ''}}"
               data-name="{{!empty($data->name) ? $data->name : ''}}"
               data-role_id="{{!empty($data->role_id) ? $data->role_id : ''}}"
               data-email="{{!empty($data->email) ? $data->email : ''}}"
               data-phone="{{!empty($data->phone) ? $data->phone : ''}}"

            ><i class="fa fa-edit"></i></a></td>
        <td>
            <form action="#" class="status">
                @csrf
                <input type="hidden" name="id"  value="{{$data->id}}">
                <button  class="btn  {!!  $data->status==1 ? 'btn-outline-success' : 'btn-outline-danger'!!}" onclick="return confirm('Do You Want to sure')"><i
                        class="fa {!!  $data->status==1 ? 'fa-eye' : 'fa-eye-slash'!!}"></i></button>
            </form>
        </td>
        <td>
            <form action="#" class="delete">
                @csrf
                <input type="hidden" name="id" value="{{$data->id}}">
                <button class="btn btn-danger" onclick="return confirm('Do You Want to sure')"><i class="fa fa-trash"></i></button>
            </form>
        </td>
    </tr>
</table>
