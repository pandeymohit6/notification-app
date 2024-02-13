import "./bootstrap";
import "bootstrap-toggle";
import "datatables.net-dt/js/dataTables.dataTables.js";
import "bootstrap-toggle/js/bootstrap-toggle.js";

import DataTable from "datatables.net-dt";

let table = new DataTable(".table", {
    // config options...
});
$(function () {
    $(".toggle-class").change(function () {
        var status = $(this).prop("checked") == true ? 1 : 0;
        var user_id = $(this).data("id");

        $.ajax({
            type: "GET",
            dataType: "json",
            url: "/notifications/changeStatus",
            data: {
                status: status,
                user_id: user_id,
            },
            success: function (data) {
                $("#msg").text(data.success).show();
            },
        });
    });
});

function callMobileApi() {
    const inputString = $("#phone").prop("value"); //for api url not using contant but we can use
    fetch(
        "https://phonevalidation.abstractapi.com/v1/?api_key=78200083dce04b978aa43aad0b435b0c&phone=" +
            inputString,
        {
            headers: {
                "Content-Type": "application/json; charset=utf-8",
            },
        }
    )
        .then((res) => res.json())
        .then((response) => {
            $(".verify").text(
                response.valid == true ? "Valid Number" : "Invalid Number"
            );
        })
        .catch((err) => {
            console.log("u");
            alert("sorry, there are no results for your search");
        });
}

$("#navbarDropdownMenuLink").click(function () {
    $(".dropdown-menu-end").toggle();
});

window.callMobileApi = callMobileApi;
