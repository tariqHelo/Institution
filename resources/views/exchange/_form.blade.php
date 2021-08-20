
    <div class="card-body">
                 <div class="form-group">
                    <label>إسم المستفيد </label>
                     <select class="form-control select2  {{ $errors->has('beneficiarie_id') ? 'is-invalid' : '' }}"  name="beneficiarie_id">
                        <option value="">--</option>
                        @foreach($beneficiaries as $id => $beneficiarie)
                          <option value="{{ $id }}" {{ ((old('beneficiarie_id' , $exchange->beneficiarie_id ))) ? 'selected' : '' }}>{{ $beneficiarie }}</option>
                        @endforeach
                    </select>
                     @error('beneficiarie_id')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                  </div>
                  {{-- <select class="form-control">
                    <option selected="selected">orange</option>
                    <option>white</option>
                    <option>purple</option>
                  </select> --}}

                  <div class="form-group">
                    <label>الكمية </label>
                    <input type="string" class="form-control @error('quantity') is-invalid @enderror" name="quantity"  placeholder=" الكمية" value="{{ old('quantity' , $exchange->quantity) }}">
                     @error('quantity')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                  </div>
                  <div class="form-group">
                    <label> إسم السلة  </label>
                      <select class="form-control  {{ $errors->has('basket_id') ? 'is-invalid' : '' }}" name="basket_id" id="basket_id" >
                        <option value="">--</option>
                        @foreach($baskets as $id => $basket)
                        <option value="{{ $id }}" {{ (( old('basket_id' , $exchange->basket_id))) ? 'selected' : '' }}>{{ $basket }}</option>
                        @endforeach
                    </select>
                    @error('basket_id')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                  </div>
                  <div class="form-group">
                    <label>ملاحظات </label>
                    <input type="text" class="form-control" value="{{ old('note', $exchange->note) }}" name="note" placeholder="ملاحظات ...">
                     {{-- @error('note')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror --}}
                  </div>
      </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">{{$button}}</button>
         <a href="{{route('exchange.index')}}" class="btn btn-danger" type="button"> إلغاء</a>
        </div>

        