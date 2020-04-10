<ul class="nav nav-tabs my-2" id="custom-content-below-tab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="custom-content-below-home-tab" 
            href="{{route('login')}}" role="tab" aria-controls="custom-content-below-home"
            aria-selected="true">Admin</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="custom-content-below-profile-tab" 
            href="{{ route('doctor.login') }}" role="tab" aria-controls="custom-content-below-profile"> Doctor</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="custom-content-below-messages-tab" 
            href="{{ route('pharmacy.login') }}" role="tab" aria-controls="custom-content-below-messages"
            >Pharmacy</a>
    </li>

</ul>
