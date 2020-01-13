@section('kt_aside')
<li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--submenu-fullheight kt-menu__item--open kt-menu__item--here"  >
  <a href="{{ route('admin.users.index') }}" class="kt-menu__link " title="Listagem de Pessoas">
    <i class="kt-menu__link-icon flaticon-users-1"></i>
    <span class="kt-menu__link-text">Pessoas</span>
    <i class="kt-menu__ver-arrow la la-angle-right"></i>
  </a>
</li>
<li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--submenu-fullheight kt-menu__item--open kt-menu__item--here"  >
  <a href="{{ route('users.index.page', ['page' => 'kanban']) }}" class="kt-menu__link " title="Kanban de Pessoa">
    <i class="kt-menu__link-icon flaticon-squares-4"></i>
    <span class="kt-menu__link-text">Kanban de Pessoas</span>
    <i class="kt-menu__ver-arrow la la-angle-right"></i>
  </a>
</li>
<li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--submenu-fullheight kt-menu__item--open kt-menu__item--here"  >
  <a href="{{ route('admin.users.create') }}" class="kt-menu__link " title="Criar Pessoa">
    <i class="kt-menu__link-icon flaticon-plus"></i>
    <span class="kt-menu__link-text">Criar Pessoas</span>
    <i class="kt-menu__ver-arrow la la-angle-right"></i>
  </a>
</li>
@endsection
