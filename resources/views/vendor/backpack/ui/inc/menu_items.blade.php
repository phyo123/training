{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<!-- <x-backpack::menu-item title="Computer skill courses" icon="la la-user-tie" :link="backpack_url('computer-skill-course')" /> -->
<x-backpack::menu-item title="ကွန်ပျူတာကျွမ်းကျင်မှုသင်တန်း" icon="la la-school" :link="backpack_url('skill')" />
<x-backpack::menu-item title="Applied Training" icon="la la-school" :link="backpack_url('applied')" />
<x-backpack::menu-item title="မွမ်းမံသင်တန်း" icon="la la-school" :link="backpack_url('refresher')" />
<!-- <x-backpack::menu-item title="Applieds" icon="la la-question" :link="backpack_url('applied')" /> -->
<!-- <x-backpack::menu-item title="Refreshers" icon="la la-question" :link="backpack_url('refresher')" /> -->