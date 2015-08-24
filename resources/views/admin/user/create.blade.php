 @extends('admin.template.index')

 @section('main_content')
     <div class="row">
         <div class="col-xs-12">
             <div class="box box-primary">
                 <div class="box-header">
                     <h3 class="box-title">Create A User In Aiko System</h3>
                 </div><!-- /.box-header -->
                     <!-- form start -->
                     @include('message.message')
                     {!! Form::open(array('route' => 'post.admin.user.create')) !!}
                         <div class="box-body">
                             <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    {!! Form::text('name',old('name'),array('class' => 'form-control', 'placeholder' => 'Enter name')) !!}
                             </div>

                             <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    {!! Form::email('email',old('email'),array('class' => 'form-control', 'placeholder' => 'Enter email')) !!}
                             </div>

                             <div class="form-group">
                                    <label for="exampleInputEmail1">Password</label>
                                    {!! Form::password('password',array('class' => 'form-control', 'placeholder' => 'Enter password')) !!}
                             </div>

                             <div class="form-group">
                                    <label for="exampleInputEmail1">Confirm Password</label>
                                    {!! Form::password('repassword',array('class' => 'form-control', 'placeholder' => 'Enter confirm password')) !!}
                             </div>

                             <div class="form-group">
                                 <label for="exampleInputEmail1">Description</label>
                                 <textarea class="form-control" rows="3" placeholder="Enter ..." name="description">{{ old('description') }}</textarea>
                             </div>

                             <div class="form-group">
                                 <label for="exampleInputEmail1">Telephone</label>
                                 {!! Form::text('telephone',old('telephone'),array('class' => 'form-control', 'placeholder' => 'Enter telephone')) !!}
                             </div>

                             <div class="form-group">
                                 <label for="exampleInputEmail1">Role</label>
                                 <div class="checkbox">
                                     <label>
                                         <input type="checkbox" value="true" name="admin" id="admin" class="roleUser">
                                         Admin
                                     </label>
                                 </div>

                                 <div class="checkbox">
                                     <label>
                                         <input type="checkbox" value="true" name="partner" id="partner" class="roleUser" checked="true">
                                         Partner
                                     </label>
                             </div>
                         </div><!-- /.box-body -->

                         <div class="box-footer">
                             {!! Form::submit('Confirm',array('name' => 'ok', 'class' => 'btn btn-primary')) !!}
                         </div>
                     {!! Form::close() !!}
             </div>
       </div>
     </div>
 @endsection

 @section('bonusJs')
    <script type="text/javascript">
        $(document).ready(function(){
            $(".roleUser").click(function(){
                if(!$("#admin").is(":checked") && !$("#partner").is(":checked")){
                    $("#partner").click();
                }
            })
        });
    </script>
 @endsection