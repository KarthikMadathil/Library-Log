<div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Form Inputs</h6>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                      <div class="row">
                        <div class="col-sm-12 col-md-6">
                          <strong class="text-muted d-block mb-2">Forms</strong>
                          <form>
                            <div class="form-group">
                              <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon1">@</span>
                                </div>
                                <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1"> </div>
                            </div>
                            <div class="form-group">
                              <input type="password" class="form-control" id="inputPassword4" placeholder="Password" value="myCoolPassword"> </div>
                            <div class="form-group">
                              <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" value="7898 Kensington Junction, New York, USA"> </div>
                            <div class="form-row">
                              <div class="form-group col-md-7">
                                <input type="text" class="form-control" id="inputCity" value="New York"> </div>
                              <div class="form-group col-md-5">
                                <select id="inputState" class="form-control">
                                  <option selected="">Choose...</option>
                                  <option>...</option>
                                </select>
                              </div>
                            </div>
                          </form>
                        </div>
                        <div class="col-sm-12 col-md-6">
                          <strong class="text-muted d-block mb-2">Form Validation</strong>
                          <form>
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <input type="text" class="form-control is-valid" id="validationServer01" placeholder="First name" value="Catalin" required="">
                                <div class="valid-feedback">The first name looks good!</div>
                              </div>
                              <div class="form-group col-md-6">
                                <input type="text" class="form-control is-valid" id="validationServer02" placeholder="Last name" value="Vasile" required="">
                                <div class="valid-feedback">The last name looks good!</div>
                              </div>
                            </div>
                            <div class="form-group">
                              <input type="text" class="form-control is-invalid" id="validationServer03" placeholder="Username" value="catalin.vasile" required="">
                              <div class="invalid-feedback">This username is taken.</div>
                            </div>
                            <div class="form-group">
                              <select class="form-control is-invalid">
                                <option selected="">Choose...</option>
                                <option>...</option>
                              </select>
                              <div class="invalid-feedback">Please select your state.</div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
