
    <div class="card-body">
                  <div class="form-group">
                    <label>الإسم </label>
                    <input type="string" class="form-control @error('name') is-invalid @enderror" name="name"  placeholder=" الإسم" value="{{ old('name' , $anothor->name) }}">
                     @error('name')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                  </div>
                  <div class="form-group">
                    <label>الهوية </label>
                    <input type="string" class="form-control @error('id_number') is-invalid @enderror" name="id_number"  placeholder="الهوية" value="{{ old('id_number', $anothor->id_number) }}">
                     @error('id_number')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                  </div>
                 <div class="form-group">
                    <label>العنوان </label>
                    <input type="string" class="form-control @error('address') is-invalid @enderror" name="address"  placeholder=" العنوان" value="{{ old('address', $anothor->address) }}">
                     @error('address')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                  </div>
                  <div class="form-group">
                    <label>الكمية </label>
                    <input type="string" class="form-control @error('quantity') is-invalid @enderror" name="quantity"  placeholder=" الكمية" value="{{ old('quantity', $anothor->quantity) }}">
                     @error('quantity')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                  </div>
                  <div class="form-group">
                    <label> إسم السلة  </label>
                      <select class="form-control  {{ $errors->has('basket_id') ? 'is-invalid' : '' }}" name="basket_id" id="basket_id" >
                        <option value="">--</option>
                        @foreach($baskets as $id => $basket)
                        <option value="{{ $id }}" {{ (( old('basket_id', $anothor->basket))) ? 'selected' : '' }}>{{ $basket }}</option>
                        @endforeach
                    </select>
                    @error('basket_id')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                  </div>
                  <div class="form-group">
                    <label>ملاحظات </label>
                    <input type="text" class="form-control" value="{{ old('note', $anothor->note) }}" name="note" placeholder="ملاحظات ...">
                  </div>
      </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">{{$button}}</button>
         <a href="{{route('anothor.index')}}" class="btn btn-danger" type="button"> إلغاء</a>
        </div>

        