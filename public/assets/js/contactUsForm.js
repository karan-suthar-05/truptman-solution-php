// Contact-us form validation

$(document).ready(function () {
    // form validation on submit event
    $("#contactusForm").on("submit", function (event) {
        event.preventDefault();
        let $is_valid = false;
        let $is_email = false;
        let $is_phone = false;
        $(this).find("input, textarea").each(function () {
            var $this = $(this);
            var nextElement = $(this).next();
            if ($this.val() === '' || $.trim($this.val()).length === 0) {
                nextElement.removeClass("d-none");
                $is_valid = false;
            }
            else {

                if ($this.attr("aria-label") === "Email") {
                    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailRegex.test($(this).val())) {
                        nextElement.text("Please enter a valid email address").removeClass("d-none");
                        $is_email = false;
                    }
                    else {
                        nextElement.addClass("d-none");
                        $is_email = true;
                    }
                }
                else if ($this.attr("aria-label") === "Phone") {
                    if ($this.val().length !== 10) {
                        nextElement.text("Please enter a valid phone number").removeClass("d-none");
                        $is_phone = false;
                    }
                    else {
                        nextElement.addClass("d-none");
                        $is_phone = true;
                    }
                }
                else {
                    $(this).next().addClass("d-none");
                }
                if ($is_email == true && $is_phone == true) {
                    $is_valid = true;
                }
                else {
                    $is_valid = false;
                }

            }
        });
        console.log($is_valid == true);
        if ($is_valid) {

            $.ajax({

                url: "/contact-us",
                method: "POST",
                data: $(this).serialize(),
                success: function (response) {

                    const responseText = response.toString();

                    if (responseText.includes("successful")) {
                        $("#errorMsg").html(response).css("color", "green");
                    } else {
                        $("#errorMsg").html(response).css("color", "red");
                    }
                },
                error: function (xhr, status, error) {
                    $("#errorMsg").html("Error: " + status + " " + error);
                }

            });
            $(this).find("input, textarea").each(function () {
                $(this).val("");
            });
        }
        setTimeout(function () {
            $("#errorMsg").html("");
        }, 5000);
    });
    // only numbers in phone number field
    $("#contactusForm input[aria-label=Phone]").on("keydown", function (e) {
        if (!(e.key === "Backspace" || (parseInt(e.key) >= 0 && parseInt(e.key) <= 9))) {
            e.preventDefault();
        }
    });

}); 