<div class="form-body">
    <div class="row">
        <div class="col-lg-4 col-md-6">
            <div class="form-group">
                <label for="userinput1">Nombre</label>
                <input type="text"  name="name" class="form-control" placeholder="Ingrese su nombre">
            </div>
            <div class="form-group">
                <label for="userinput2">Nombre de Usuario</label>
                <input type="text" name="username" class="form-control" placeholder="Ingrese su nombre de usuario">
            </div>
            <div class="form-group">
                <label for="userinput2">Email</label>
                <input type="text" name="email" class="form-control" placeholder="Ingrese su e-mail">
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="form-group">
                {{-- Roles: 1 Superadmin - 2 Admin - 3 User - 4 Guest --}}
                <label for="userinput2">Rol</label>
                <select name="role" class="form-control">
                    <option value="1">SuperAdmin</option>
                    <option value="2">Admin</option>
                    <option value="3">User</option>
                    <option value="4">Invitado</option>
                </select>
            </div>
            <div class="form-group">
                {{-- Group: 1 Member - 2 Client - 3 ClientBig --}}
                <label for="userinput2">Grupo</label>
                <select name="role" class="form-control">
                    <option value="1">Miembro</option>
                    <option value="2">Cliente</option>
                    <option value="3">Mayorísta</option>
                </select>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="form-group">
                <label for="userinput3">Contraseña</label>
                <input type="password" name="password" class="form-control" placeholder="Ingrese su contraseña">
            </div>

            <div class="form-group">
                <label for="userinput4">Confirmar Contraseña</label>
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirme su contraseña" >
            </div>
        </div>
    </div>
    <div class="form-actions right">
        <a href="{{ route('users.index')}}">
            <button type="button" class="btn btnRed">
                <i class="icon-cross2"></i> Cancelar
            </button>
        </a>
        <button type="submit" class="btn btnGreen">
            <i class="icon-check2"></i> Guardar
        </button>
    </div>
</div>