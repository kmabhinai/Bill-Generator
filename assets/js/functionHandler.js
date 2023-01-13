let prev_count = 1;

let append_row = (div_data) => {
    let tr = document.createElement("tr");
    tr.innerHTML = `
    <td class="text-center w-3x pt-2"> <input type="checkbox" name="chk_box" /> </td>
    <td class="w-10x">
      <div class="form-group mb-1">
        <input class="form-control form-control-sm font-sm" type="text" name="work" />
      </div>
    </td>
    <td class="w-10x">
      <div class="form-group mb-1">
        <input class="form-control form-control-sm font-sm" type="number" min="1" value="1" name="quantity" onchange="totalForEach(this);grossAmt();billDetails();"/>
      </div>
    </td>
    <td class="w-10x">
      <div class="form-group mb-1">
        <input class="form-control form-control-sm font-sm" type="number" min="1" name="challana" onchange="totalForEach(this);grossAmt();billDetails();"/>
      </div>
    </td>
    <td class="w-10x" name="bill">
      <div class="form-group mb-1">
        <input class="form-control form-control-sm font-sm" type="number" min="1" name="bill" onchange="totalForEach(this);grossAmt();billDetails();"/>
      </div>
    </td>
    <td class="w-10x">
      <div class="form-group mb-1">
        <input class="form-control form-control-sm font-sm" type="number" min="1" name="total" disabled />
      </div>
    </td>
    <td class="w-10x" style="width: 34.412px">
      <button class="btn btn-info btn-block btn-sm add-row btn-xs" type="button" onclick="increaseOneAddBtn()">
        <i class="fa fa-plus"></i>
      </button>
    </td>
    <td class="w-10x" style="width: 34.412px">
      <button class="btn btn-danger btn-block btn-sm delete-row btn-xs" type="button" onclick="deleteOne(this)"> <i class="fa fa-trash-o"></i>
      </button>
    </td>
`;
    div_data.appendChild(tr);
};

let insertFields = () => {
    let count = document.getElementById("count").value * 1;
    // alert(count);
    let div_data = document.getElementsByClassName("h-15x")[0];

    if (prev_count < count) {
        for (let i = 0; i < (count - prev_count); i++) {
            append_row(div_data);
        }
    } else if (count >= 1) {
        let div_row_exist = document.getElementsByTagName("tr");
        for (let i = 0; i < (prev_count - count); i++) {
            div_row_exist[1].parentNode.removeChild(div_row_exist[div_row_exist.length - 1]);
        }
        // totalBill();
    }
    prev_count = count;
};

let increaseOneAddBtn = () => {
    let count = document.getElementById("count");
    count.value = (count.value * 1) + 1;
    insertFields();
};

let deleteOne = (btn) => {
    let count = document.getElementById("count");
    if (count.value * 1 > 1) {
        count.value = (count.value * 1) - 1;
        btn.parentNode.parentNode.remove();
        prev_count = count.value;
    }
};

let totalForEach = (field) => {
    let rowChildren = field.parentNode.parentNode.parentNode.children;
    let quantity = (rowChildren[2].children[0].children[0].value) * 1;
    let challana = (rowChildren[3].children[0].children[0].value) * 1;
    let bill = (rowChildren[4].children[0].children[0].value) * 1;
    let total = rowChildren[5].children[0].children[0];
    let totBill = quantity * (bill + challana);
    total.value = totBill;
};

let grossAmt = () => {
    let individualTotals = document.getElementsByName("total");
    let sum = 0;
    individualTotals.forEach((total) => {
        sum += total.value * 1;
    });
    let gross = document.getElementsByName("total_amt")[0];
    gross.value = sum;
};

let billDetails = () => {
    let grossAmount = document.getElementsByName("total_amt")[0].value * 1;
    let cash = document.getElementsByName("cash")[0].value;
    let upi = document.getElementsByName("upi")[0].value;
    let totalCashPaid = (cash * 1) + (upi * 1);
    let dueAmount = document.getElementsByName("due_amt")[0];
    let change = document.getElementsByName("remaining_amt")[0];
    if (cash || upi) {
        if (grossAmount >= totalCashPaid) {
            dueAmount.value = grossAmount - totalCashPaid;
            change.value = 0;
        } else {
            change.value = totalCashPaid - grossAmount;
            dueAmount.value = 0;
        }
    }
};

let deleteMultiple = () => {
    let chkBoxes = document.getElementsByName("chk_box");
    chkBoxes.forEach((box) => {
        console.log(box);
        if (box.checked) {
            box.parentNode.parentNode.remove();
        }
    });
    prev_count = document.getElementsByName("chk_box").length;
    let count = document.getElementById("count");
    count.value = prev_count;
};

let allWork = () => {
    let allWorkStr = Array.from(document.getElementsByName("work"));
    let str = [];
    allWorkStr.forEach((e) => {
        if (e.value == '') return;
        str.push(e.value);
    });
    let allWorkField = document.getElementById("all_work");
    allWorkField.value = str.join(",");
};

let allBill = () => {
    let allBillStr = Array.from(document.getElementsByName("bill"));
    let str = [];
    allBillStr.forEach((e) => {
        if (e.value == '') return;
        str.push(e.value);
    });
    let allBillField = document.getElementById("all_bill");
    allBillField.value = str.join(",");
};

let allChallana = () => {
    let allChallanaStr = Array.from(document.getElementsByName("challana"));
    let str = [];
    allChallanaStr.forEach((e) => {
        if (e.value == '') return;
        str.push(e.value);
    });
    let allChallanaField = document.getElementById("all_challana");
    allChallanaField.value = str.join(",");
};