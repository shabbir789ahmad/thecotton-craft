<div class="col-md-12">
             
              <label><i class="fas fa-user "></i>Full Name</label>
              <input type="text" name="name" class="form-control" @if(Auth::user()) value="{{Auth::user()->name}}" @endif required>
              <span class="text-danger">@error ('name') {{$message}} @enderror</span>


            </div>

            <div class="col-md-6">
              <label ><i class="fas fa-envelope mt-2"></i> Email</label>
              <input type="text" name="email" @if(Auth::user()) value="{{Auth::user()->email}}" @endif class="form-control" >
              <span class="text-danger">@error ('email') {{$message}} @enderror</span>
            </div>

            <div class="col-md-6">
             <label class="mt-2"><i class="fas fa-building"></i> Phone</label>
             <input type="number" name="phone" @if(Auth::user()) value="{{Auth::user()->phone}}" @endif class="form-control" required>
             <span class="text-danger">@error ('phone') {{$message}} @enderror</span>
            </div>
          

          <div class="col-md-6">
              <label class="mt-2"><i class="fas fa-map-marker-alt"></i> Address</label>
              <input type="text" name="address" class="form-control" required>
              <span class="text-danger">@error ('address') {{$message}} @enderror</span>
             </div>

            <div class="col-md-6">
              <label class="mt-2"><i class="fas fa-globe"></i> Country</label>
               <input type="text" name="country" value="Pakistan"  class="form-control" required>
               <span>@error ('country') {{$message}} @enderror</span>
            </div>