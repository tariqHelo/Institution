 <div class="card-body">
                    <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label">رقم الكوبون</label>
                                  <input type="number" name="coupon" class="form-control" placeholder="Chee Kin">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label">رقم الطلب</label>
                                  <input type="number" name="order_number" class="form-control" placeholder="Chee Kin">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label">رقم التتبع</label>
                                  <input type="number" name="tracking_number"  class="form-control" placeholder="Chee Kin">
                                </div>
                              </div>

                    </div>
                     <div class="form-group">
                        <label>تاريخ الإستلام </label>
                          <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                          </div>
                          <input type="date" name="received_date" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                    </div>
                    <div class="form-group">
                      <label>نوع المرسل</label>
                      <select class="form-control" name="sender">
                        <option>option 1</option>
                        <option>option 2</option>
                        <option>option 3</option>
                        <option>option 4</option>
                        <option>option 5</option>
                      </select>
                    </div>
                   
                    <div class="form-group">
                      <label for="exampleInputEmail1">إسم المستلم</label>
                      <input type="string" name="recipient_name" class="form-control @error('english_name') is-invalid @enderror" name="english_name" id="exampleInputEmail1" placeholder="إسم البلد بالإنجليزية">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">رقم الهاتف</label>
                      <input type="number" name="phone1" class="form-control @error('english_name') is-invalid @enderror" name="english_name" id="exampleInputEmail1" placeholder="إسم البلد بالإنجليزية">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">رقم الهاتف أخر</label>
                      <input type="number" name="phone2" class="form-control @error('english_name') is-invalid @enderror" name="english_name" id="exampleInputEmail1" placeholder="إسم البلد بالإنجليزية">
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                              <label>الدولة</label>
                              <select class="form-control" name="country_id">
                                   @foreach ($countries as $country)
                                     <option value="{{ $country->id }}" @if($country->id == old('country_id', $country->country_id)) selected @endif>{{ $country->name }}</option>
                                  @endforeach
                              </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                              <label>المدينة</label>
                              <select class="form-control" name="city_id">
                                  @foreach ($cities as $city)
                                     <option value="{{ $city->id }}" @if($city->id == old('city_id', $city->city_id)) selected @endif>{{ $city->name }}</option>
                                  @endforeach
                              </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                              <label>المنطقة</label>
                              <select class="form-control" name="area_id">
                                  @foreach ($areas as $area)
                                     <option value="{{ $area->id }}" @if($area->id == old('area_id', $area->area_id)) selected @endif>{{ $area->name }}</option>
                                  @endforeach
                              </select>
                          </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">العنوان بالكامل</label>
                      <input type="string" name="address" class="form-control @error('english_name') is-invalid @enderror" name="english_name" id="exampleInputEmail1" placeholder="إسم البلد بالإنجليزية">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">رقم المنزل</label>
                      <input type="number" name="house_number" class="form-control @error('english_name') is-invalid @enderror" name="english_name" id="exampleInputEmail1" placeholder="إسم البلد بالإنجليزية">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">عدد الأكياس أو العلب</label>
                      <input type="number" name="number_of_bags" class="form-control @error('english_name') is-invalid @enderror" name="english_name" id="exampleInputEmail1" placeholder="إسم البلد بالإنجليزية">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">مواد الشحنة</label>
                      <input type="string" name="shipment_material" class="form-control @error('english_name') is-invalid @enderror" name="english_name" id="exampleInputEmail1" placeholder="إسم البلد بالإنجليزية">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">إجمالي الوزن بالكيلو </label>
                      <input type="number" name="kg" class="form-control @error('english_name') is-invalid @enderror" name="english_name" id="exampleInputEmail1" placeholder="إسم البلد بالإنجليزية">
                    </div>
                    <div class="form-group">
                      <label>نوع الخدمة</label>
                      <select class="form-control" name="service_id">
                        @foreach ($services as $service)
                            <option value="{{ $service->id }}" @if($service->id == old('type', $service->type)) selected @endif>{{ $service->name }}</option>
                        @endforeach
                      </select>
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">رسوم الشحن </label>
                      <input type="string" name="Shipping_fee" class="form-control @error('english_name') is-invalid @enderror" name="english_name" id="exampleInputEmail1" placeholder="إسم البلد بالإنجليزية">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">مبلغ الطلبية بدون رسوم الشحن </label>
                      <input type="string" name="order_amount" class="form-control @error('english_name') is-invalid @enderror" name="english_name" id="exampleInputEmail1" placeholder="إسم البلد بالإنجليزية">
                    </div>
                    <div class="form-group">
                      <label>مبلغ الشحن على </label>
                      <select class="form-control" name="shipping_amount">
                        <option value="receiver">receiver</option>
                        <option value="sender">sender</option>
                       
                      </select>
                    </div>
                    <div class="form-group">
                        <label>الملاحظات </label>
                        <input type="text" name="notes" class="form-control" placeholder="Enter ...">
                      </div>
                    <div class="form-group">
                        <label>ملاحظات أخرى</label>
                        <textarea class="form-control" name="details" rows="3" placeholder="Enter ..."></textarea>
                      </div>
                    </div>
                      
                    
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">{{$button}}</button>
                  <a href="{{route('order.index')}}" class="btn btn-danger" type="button"> إلغاء</a>
                </div>