@props(['name'])

@if (session()->has($name))
    <div 
        class="position-fixed bg-primary rounded mr-2" 
        style="right:0;z-index:50" 
        x-data="{ show: true }" 
        x-init="setTimeout(() => show = false, 4000)"
        x-show="show" 
    >
        <p class="p-2 m-0"> {{ session($name) }} </p>
    </div>
@endif