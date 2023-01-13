<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
    />
    <title>bill</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css" />
    <link
      rel="stylesheet"
      href="assets/css/Billing-Table-with-Add-Row--Fixed-Header-Feature.css"
    />
  </head>

  <body>
    <section>
      <div class="container">
        <div class="row mt-4">
          <div class="col">
            <div class="card shadow-sm mb-2 db-graph">
              <div class="card-header p-2">
                <h6
                  class="text-white m-0 font-md"
                  style="text-align: center; font-weight: bold"
                >
                  Counter Token<br />
                </h6>
              </div>
              <div class="card-body">
                <form>
                  <div class="form-row">
                    <div class="col-md-9 col-xl-9">
                      <div class="box-bg">
                        <div class="form-row justify-content-center">
                          <div class="col-xl-2 align-self-center">
                            <input
                              class="form-control form-control-sm align-self-center"
                              type="number"
                              id="count"
                              min="1"
                              value="1"
                              onchange="insertFields()"
                            />
                          </div>
                          <div class="col-md-1 col-xl-2 align-self-center">
                            <button
                              class="btn btn-danger btn-block btn-sm delete-row btn-xs"
                              type="button"
                              style="width: 100%"
                              onclick="deleteMultiple();"
                            >
                              <i class="fa fa-trash-o"></i
                              ><strong> Delete Multiple</strong>
                            </button>
                          </div>
                        </div>
                        <div class="table-responsive tbl-wfx mt-1 kot-table">
                          <table class="table table-sm">
                            <thead class="text-dark font-md">
                              <tr class="text-dark-blue">
                                <th class="text-center w-3x">
                                  <strong>#</strong>
                                </th>
                                <th class="text-center" style="width: 100px">
                                  <strong>Service</strong>
                                </th>
                                <th class="text-center w-10x">
                                  <strong>Quantity</strong>
                                </th>
                                <th class="text-center w-10x">
                                  <strong>&nbsp; Challana</strong><br />
                                </th>
                                <th class="text-center w-10x">
                                  <strong>Bill</strong>
                                </th>
                                <th class="text-center w-10x">
                                  <strong>Total</strong>
                                </th>
                                <th class="text-center w-10x">
                                  <strong>Actions</strong>
                                </th>
                              </tr>
                            </thead>
                            <tbody class="h-15x" style="height: 100%">
                              <tr>
                                <td class="text-center w-3x pt-2">
                                  <input type="checkbox" name="chk_box" />
                                </td>
                                <td class="w-10x">
                                  <div class="form-group mb-1">
                                    <input
                                      class="form-control form-control-sm font-sm"
                                      type="text"
                                      name="work"
                                    />
                                  </div>
                                </td>
                                <td class="w-10x">
                                  <div class="form-group mb-1">
                                    <input
                                      class="form-control form-control-sm font-sm"
                                      type="number"
                                      min="1"
                                      name="quantity"
                                      value="1"
                                      onchange="totalForEach(this);grossAmt();billDetails()"
                                    />
                                  </div>
                                </td>
                                <td class="w-10x">
                                  <div class="form-group mb-1">
                                    <input
                                      class="form-control form-control-sm font-sm"
                                      type="number"
                                      min="1"
                                      name="challana"
                                      onchange="totalForEach(this);grossAmt();billDetails()"
                                    />
                                  </div>
                                </td>
                                <td class="w-10x">
                                  <div class="form-group mb-1">
                                    <input
                                      class="form-control form-control-sm font-sm"
                                      type="number"
                                      min="1"
                                      name="bill"
                                      onchange="totalForEach(this);grossAmt();billDetails()"
                                    />
                                  </div>
                                </td>
                                <td class="w-10x">
                                  <div class="form-group mb-1">
                                    <input
                                      class="form-control form-control-sm font-sm"
                                      type="number"
                                      min="1"
                                      name="total"
                                      disabled=""
                                    />
                                  </div>
                                </td>
                                <td class="w-10x" style="width: 34.412px">
                                  <button
                                    class="btn btn-info btn-block btn-sm add-row btn-xs"
                                    type="button"
                                    onclick="increaseOneAddBtn()"
                                  >
                                    <i class="fa fa-plus"></i>
                                  </button>
                                </td>
                                <td class="w-10x" style="width: 34.412px">
                                  <button
                                    class="btn btn-danger btn-block btn-sm delete-row btn-xs"
                                    type="button"
                                    onclick="deleteOne(this)"
                                  >
                                    <i class="fa fa-trash-o"></i>
                                  </button>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <input type="number" name="profit" value="0" hidden />
                      <input type="text" name="all_work" hidden />
                      <input type="text" name="all_bill" hidden />
                      <input type="text" name="all_challana" hidden />
                    </div>
                    <div class="col-md-3 col-xl-3">
                      <div class="box-bg">
                        <div class="form-row text-dark">
                          <div
                            class="col-xl-5 offset-xl-0 align-self-center"
                            style="margin-top: 10px"
                          >
                            <h6 class="mb-0 font-sm">Name:</h6>
                          </div>
                          <div
                            class="col-xl-7 offset-xl-0 text-right align-self-center"
                            style="margin-top: 10px"
                          >
                            <div class="form-group mb-1">
                              <input
                                class="form-control form-control-sm font-sm"
                                type="text"
                                name="name"
                              />
                            </div>
                          </div>
                          <div
                            class="col-xl-5 offset-xl-0 align-self-center"
                            style="margin-top: 10px"
                          >
                            <h6 class="mb-0 font-sm">Phone Number:</h6>
                          </div>
                          <div
                            class="col-xl-7 offset-xl-0 text-right align-self-center"
                            style="margin-top: 10px"
                          >
                            <div class="form-group mb-1">
                              <input
                                class="form-control font-sm"
                                type="number"
                                name="phno"
                              />
                            </div>
                          </div>
                          <div
                            class="col-xl-5 offset-xl-0 align-self-center"
                            style="margin-top: 10px"
                          >
                            <h6 class="mb-0 font-sm">Gross amount:<br /></h6>
                          </div>
                          <div
                            class="col-xl-7 offset-xl-0 text-right align-self-center"
                            style="margin-top: 10px"
                          >
                            <div class="form-group mb-1">
                              <input
                                class="form-control font-sm"
                                type="number"
                                disabled=""
                                name="total_amt"
                              />
                            </div>
                          </div>
                          <div
                            class="col-xl-5 offset-xl-0 align-self-center"
                            style="margin-top: 10px"
                          >
                            <h6 class="mb-0 font-sm">Cash:</h6>
                          </div>
                          <div
                            class="col-xl-7 offset-xl-0 text-right align-self-center"
                            style="margin-top: 10px"
                          >
                            <div class="form-group mb-1">
                              <input
                                class="form-control font-sm"
                                type="number"
                                name="cash"
                                onchange="billDetails()"
                              />
                            </div>
                          </div>
                          <div
                            class="col-xl-5 offset-xl-0 align-self-center"
                            style="margin-top: 10px"
                          >
                            <h6 class="mb-0 font-sm">UPI:</h6>
                          </div>
                          <div
                            class="col-xl-7 offset-xl-0 text-right align-self-center"
                            style="margin-top: 10px"
                          >
                            <div class="form-group mb-1">
                              <input
                                class="form-control font-sm"
                                type="number"
                                name="upi"
                                onchange="billDetails()"
                              />
                            </div>
                          </div>
                          <div
                            class="col-xl-5 offset-xl-0 align-self-center"
                            style="margin-top: 10px"
                          >
                            <h6 class="mb-0 font-sm">Due Amount:</h6>
                          </div>
                          <div
                            class="col-xl-7 offset-xl-0 text-left align-self-center"
                            style="margin-top: 10px"
                          >
                            <div class="form-group mb-1">
                              <input
                                class="form-control font-sm"
                                type="number"
                                disabled=""
                                name="due_amt"
                              />
                            </div>
                          </div>
                          <div
                            class="col-xl-5 offset-xl-0 align-self-center"
                            style="margin-top: 10px"
                          >
                            <h6 class="mb-0 font-sm">Change :</h6>
                          </div>
                          <div
                            class="col-xl-7 offset-xl-0 text-left align-self-center"
                            style="margin-top: 10px"
                          >
                            <div class="form-group mb-1">
                              <input
                                class="form-control font-sm"
                                type="number"
                                disabled=""
                                name="remaining_amt"
                              />
                            </div>
                          </div>
                          <div
                            class="col-xl-5 offset-xl-0 align-self-center"
                            style="margin-top: 10px"
                          >
                            <h6 class="mb-0 font-sm">Payment status:</h6>
                          </div>
                          <div
                            class="col-xl-7 offset-xl-0 text-right align-self-center"
                            style="margin-top: 10px"
                          >
                            <div class="form-group mb-1">
                              <select
                                class="custom-select custom-select-sm font-sm"
                                id="payment_stat-2"
                                name="payment_status"
                              >
                                <option value="unpaid">Not Paid</option>
                                <option value="paid">Paid</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-xl offset-xl-0 text-right">
                            <a
                              class="btn btn-info btn-block btn-sm mt-3 mb-1 btn-smd"
                              role="button"
                              id="inv_btn-1"
                              ><i class="fa fa-save"></i
                              ><strong>&nbsp; Submit</strong><br
                            /></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/functionHandler.js"></script>
    <script
      src="https://code.jquery.com/jquery-3.5.1.min.js"
      type="module"
    ></script>
  </body>
</html>
