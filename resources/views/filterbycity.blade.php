 <!-- Modal -->
      <div class="modal fade" id="cityModal" role="dialog">
          <div class="modal-dialog modal-lg">
              <!-- Modal content-->
              <form ="action="{{ route('customers.filter') }}"" method="post">
                 @csrf

                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="modal-body">
                          <!--Lọc theo khóa học -->
                          <div class="select-by-program">
                              <div class="form-group row">
                                  <label class="col-sm-5 col-form-label border-right">Lọc khách hàng theo tỉnh thành</label>
                                  <div class="col-sm-7">
                                      <select class="custom-select w-100" name="city_id">
                                          <option value="">Chọn tỉnh thành</option>
                                          @foreach($cities as $city)
                                              @if(isset($cityFilter))
                                                  @if($city->id == $cityFilter->id)
                                                      <option value="{{$city->id}}" selected >{{ $city->name }}</option>
                                                  @else
                                                      <option value="{{$city->id}}">{{ $city->name }}</option>
                                                  @endif
                                              @else
                                                  <option value="{{$city->id}}">{{ $city->name }}
                                                  </option>
                                              @endif
                                          @endforeach
                                      </select>
                                  </div>
                              </div>
                              <!-- </form> -->
                          </div>
                          <!--End-->

                      </div>
                      <div class="modal-footer">
                          <button type="submit" id="submitAjax" class="btn btn-primary" >Chọn</button>
                          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Hủy</button>
                      </div>
                  </div>
              </form>
          </div>
      </div>
  </div>
