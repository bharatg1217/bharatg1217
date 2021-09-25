<section id="buy-tickets" class="section-with-bg wow fadeInUp">
  <div class="container">

    <div class="section-header">
      <h2>Book Tickets</h2>
      
    </div>

    <div class="row">
      @foreach($prices as $price)
        <div class="col-lg-4">
          <div class="card mb-5 mb-lg-0">
            <div class="card-body">
              <h5 class="card-title text-muted text-uppercase text-center">{{ $price->name }}</h5>
              <h6 class="card-price text-center">{{ number_format($price->price) }}rs</h6>
              <hr>
              <ul class="fa-ul">
                @foreach($amenities as $amenity)
                  <li @if(!$price->amenities->contains($amenity->id))class="text-muted"@endif>
                    <span class="fa-li"><i class="fa fa-{{ $price->amenities->contains($amenity->id) ? 'check' : 'times' }}"></i></span>{{ $amenity->name }}
                  </li>
                @endforeach
              </ul>
              <hr>
              <div class="text-center">
                <button type="button" class="btn" data-toggle="modal" data-target="#buy-ticket-modal" data-ticket-type="{{ Str::slug($price->name) }}">Buy Now</button>
              </div>
            </div>
          </div>
        </div>
      @endforeach
  </div>

  <!-- Modal Order Form -->
  <div id="buy-ticket-modal" class="modal fade">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Book Tickets</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- <form method="POST" action="{{ route("admin.tickets.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <input type="text" class="form-control" name="name" placeholder="Your Name">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="email" placeholder="Your Email">
            </div>
            <div class="form-group">
              <select id="ticket-type" name="ticket-type" class="form-control" >
                <option value="">-- Select Your Ticket Type --</option>
                @foreach($prices as $price)
                  <option value="{{ Str::slug($price->name) }}">{{ $price->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="text-center">
              <button type="submit" class="btn">Book Now</button>
            </div>
          </form> -->
          <form action="{{ route("admin.tickets.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <input type="text" id="name" name="name" class="form-control" placeholder="Your Name" value="{{ old('name', isset($ticket) ? $ticket->name : '') }}" required>
                @if($errors->has('name'))
                    <p class="help-block">
                        {{ $errors->first('name') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.ticket.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <input type="text" id="email" name="email" class="form-control " placeholder="Your Email" {{ old('email', isset($ticket) ? $ticket->email : '') }}>
                @if($errors->has('email'))
                    <p class="help-block">
                        {{ $errors->first('email') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.ticket.fields.email_helper') }}
                </p>
            </div>
            
            <div class="form-group {{ $errors->has('ticke_type') ? 'has-error' : '' }}">
              <select id="ticke_type" name="ticke_type" class="form-control" >
                <option value="">-- Select Your Ticket Type --</option>
                @foreach($prices as $price)
                  <option value="{{ old('price->id', isset($price) ? $price->id : '') }}">{{ $price->name }}</option>
                @endforeach
              </select>
            
                <!-- <input type="text" id="ticke_type" name="ticke_type" class="form-control" value="{{ old('ticke_type', isset($ticket) ? $ticket->ticke_type : '') }}"> -->
                @if($errors->has('ticke_type'))
                    <p class="help-block">
                        {{ $errors->first('ticke_type') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.ticket.fields.ticke_type_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="Book Now">
            </div>
        </form>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

</section>
