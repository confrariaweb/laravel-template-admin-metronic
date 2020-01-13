<div class="kt-portlet">
    <form class="kt-form kt-form--label-right" id="filter_users">
        <div class="kt-portlet__body">
            <div class="form-group row">
                <div class="col-md-3">
                    <label>Nome</label>
                    {{ Form::text('name', isset($get['name'])? $get['name'] : null, ['class' => 'form-control', 'id' => 'column1_search']) }}
                </div>
                <div class="col-md-3">
                    <label>CPF/CNPJ</label>
                    {{ Form::text('cpf_cnpj', isset($get['cpf_cnpj'])? $get['cpf_cnpj'] : null, ['class' => 'form-control', 'id' => 'column2_search']) }}
                </div>
                <div class="col-md-3">
                    <label>Perfil</label>
                    {{ Form::select('roles[]', $roles->prepend('')->pluck('display_name','id'), isset($get['roles'])? $get['roles'] : null, ['class' => 'form-control', 'id' => 'column3_search']) }}
                </div>
                <!--div class="col-md-3">
                    <label>Fase</label>
                    {{ Form::select('steps[]', $stepInject->pluck(), isset($get['steps'])? $get['steps'] : null, ['class' => 'form-control']) }}
                </div-->
                <div class="col-md-3">
                    <label>Vendedora</label>
                    {{ Form::select('employees[]', $userInject->employees()->prepend('Escolha', 'NULL'), isset($get['employees'])? $get['employees'] : null, ['class' => 'form-control', 'id' => 'column4_search']) }}
                </div>
            </div>
            <div class="form-group row">
            <!--div class="col-md-3">
                    <label>Telefone</label>
                    {{ Form::tel('options[phone]', isset($get['options']['phone'])? $get['options']['phone'] : null, ['class' => 'form-control']) }}
                </div-->
            </div>
        </div>
        <!--div class="kt-portlet__foot">
            <div class="kt-form__actions">
                <button type="submit" class="btn btn-primary">Filtrar</button>
                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Limpar</a>
            </div>
        </div-->
    </form>
</div>
