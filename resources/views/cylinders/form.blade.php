<div class="form-group">
    <label for="name">name</label>
    <input type="text" name="name" class="form-control @error('name') border border-danger @enderror"  aria-describedby="textHelp" placeholder="Enter name" value="{{ old('name') ??$cylinder->name ?? '' }}" >
    @error('name')
		<div class="alert alert-danger" role="alert">{{ $errors->first('name') }}</div>
	@enderror
</div>

<div class="form-group">
    <label for="gas_id">Gas</label>
    <select name="gas_id" class="form-control @error('gas_id') border border-danger" @enderror required="required">
	    
    	@empty ($cylinder) <option disabled selected></option> @endempty
    	@foreach( $gases as $gas )

    		<option value="{{ $gas->id }}" 
    				@if (old('gas_id') == $gas->id ) 
    					selected
    				@elseif ( isset($cylinder) )
						@if ( $cylinder->gas->id == $gas->id )
							selected
						@endif
					@endif
				>{{ $gas->name }}</option>

    	@endforeach
    	
    </select>
	@error('gas_id')
		<div class="alert alert-danger" role="alert">{{ $errors->first('gas_id') }}</div>
	@enderror
</div>

<div class="form-group">
    <label for="volume">Cylinder Volume</label>
    <input type="number" name="volume" class="form-control @error('volume') border border-danger @enderror" step="0.01" aria-describedby="textHelp" placeholder="Enter volume"  value="{{ old('volume') ?? $cylinder->volume ?? '' }}">
    @error('volume')
		<div class="alert alert-danger" role="alert">{{ $errors->first('volume') }}</div>
	@enderror
</div>

<div class="form-group">
    <label for="pressure">Pressure</label>
    <input type="number" name="pressure" class="form-control @error('pressure') border border-danger @enderror" aria-describedby="textHelp" placeholder="Enter pressure"  value="{{ old('pressure') ?? $cylinder->pressure ?? '' }}">
    @error('pressure')
		<div class="alert alert-danger" role="alert">{{ $errors->first('pressure') }}</div>
	@enderror
</div>

<div class="form-group">
    <label for="vendor">Vendor</label>
    <input type="text" name="vendor" class="form-control @error('vendor') border border-danger @enderror"  aria-describedby="vendorHelp" placeholder="Enter vendor"  value="{{ old('vendor') ?? $cylinder->vendor ?? '' }}">
	<small id="vendorHelp" class="form-text text-muted"></small>
    @error('vendor')
		<div class="alert alert-danger" role="alert">{{ $errors->first('vendor') }}</div>
	@enderror
</div>

<div class="form-group">
    <label for="partNumber">Part Number</label>
    <input type="text" name="partNumber" class="form-control @error('partNumber') border border-danger @enderror" aria-describedby="textHelp" placeholder="Enter Part Number"  value="{{ old('partNumber') ?? $cylinder->partNumber ?? '' }}">
    @error('partNumber')
		<div class="alert alert-danger" role="alert">{{ $errors->first('partNumber') }}</div>
	@enderror
</div>

<div class="form-group">

	<button type="submit" class="btn btn-outline-primary">
		@if ( isset( $cylinder ) ) Update @else Create @endif
	</button>

</div>