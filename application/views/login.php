<main class="main mt-5">
    <div class="innerpage-banner mt-6">
        <img src="assets/img/inner-banner.jpg" alt="banner-image" class="w-100">
        <div class="overlay-text">
            <div class="container">
                <h1 class="white">Login / Signup</h1>
            </div>
        </div>
    </div>

    <section class="form-section">
        <div class="container">
            <div class="col-md-8 mx-auto">

                <div id="loginForm">
                    <div class="form-container">
                        <h2 class="section-heading mb-5 text-center">Login Form</h2>
                        <div class="row">
                            <div class="form-group  mb-md-4 col-md-2">
                                <label for="">Title</label>
                                <select name="" id="" class="form-control">
                                    <!-- <option value="Mr.">Mr.</option> -->
                                    <option value="Mr.">Mr.</option>
                                    <option value="Ms.">Ms.</option>
                                    <option value="Dr.">Dr.</option>
                                    <option value="Prof.">Prof.</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>

                            <div class="form-group mb-md-4 col-md-5">
                                <label for="">First Name</label>
                                <input type="text" class="form-control" placeholder="First Name">
                            </div>
                            <div class="form-group mb-md-4 col-md-5">
                                <label for="">Last Name</label>
                                <input type="text" class="form-control" placeholder="Last Name">
                            </div>
                            <div class="form-group mb-md-4 col-md-12">
                                <label for="">Gender</label>
                                <div class="d-flex">
                                    <div class="form-check me-4">
                                        <input class="form-check-input" type="radio" name="gender" id="male">
                                        <label class="form-check-label" for="male">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="female">
                                        <label class="form-check-label" for="female">
                                            Female
                                        </label>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group mb-md-4 col-md-6">
                                <label for="">Designation</label>
                                <input type="text" class="form-control" placeholder="Designation">
                            </div>
                            <div class="form-group mb-md-4 col-md-6">
                                <label for="">Organization</label>
                                <input type="text" class="form-control" placeholder="Organization">
                            </div>
                            <div class="form-group mb-md-4 col-md-6">
                                <label for="">Email Address</label>
                                <input type="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group mb-md-4 col-md-6">
                                <label for="">Contact Number</label>
                                <input type="text" class="form-control" placeholder="Contact Number"
                                    maxlength="10" minlength="10" onkeydown="return ( event.ctrlKey || event.altKey
                                        || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false)
                                        || (95<event.keyCode && event.keyCode<106)
                                        || (event.keyCode==8) || (event.keyCode==9)
                                        || (event.keyCode>34 && event.keyCode<40)
                                        || (event.keyCode==46) )">
                            </div>

                            <div class="form-group mb-md-4 col-md-12">
                                <label for="">Participation On</label>
                                <div class="d-flex">
                                    <div class="form-check me-4">
                                        <input class="form-check-input" type="radio" name="participation" id="28">
                                        <label class="form-check-label" for="28">
                                            28<sup>th</sup> October 2025
                                        </label>
                                    </div>
                                    <div class="form-check me-4">
                                        <input class="form-check-input" type="radio" name="participation" id="29">
                                        <label class="form-check-label" for="29">
                                            29<sup>th</sup> October 2025
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="participation" id="both" checked>
                                        <label class="form-check-label" for="both">
                                            Both
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="text-center mt-md-5">
                            <button class="btn btn-read-more">Submit</button>
                        </div>
                    </div>
                </div>


                <div id="otpForm" class="mt-5">
                    <div class="otp-sections">
                        <div class="form-container">
                            <h2 class="section-heading mb-5 text-center">Enter OTP</h2>

                            <form id="otp-form">
                                <input type="text" class="otp-input" maxlength="1" onkeydown="return ( event.ctrlKey || event.altKey
                                        || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false)
                                        || (95<event.keyCode && event.keyCode<106)
                                        || (event.keyCode==8) || (event.keyCode==9)
                                        || (event.keyCode>34 && event.keyCode<40)
                                        || (event.keyCode==46) )">
                                <input type="text" class="otp-input" maxlength="1" onkeydown="return ( event.ctrlKey || event.altKey
                                        || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false)
                                        || (95<event.keyCode && event.keyCode<106)
                                        || (event.keyCode==8) || (event.keyCode==9)
                                        || (event.keyCode>34 && event.keyCode<40)
                                        || (event.keyCode==46) )">
                                <input type="text" class="otp-input" maxlength="1" onkeydown="return ( event.ctrlKey || event.altKey
                                        || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false)
                                        || (95<event.keyCode && event.keyCode<106)
                                        || (event.keyCode==8) || (event.keyCode==9)
                                        || (event.keyCode>34 && event.keyCode<40)
                                        || (event.keyCode==46) )">
                                <input type="text" class="otp-input" maxlength="1" onkeydown="return ( event.ctrlKey || event.altKey
                                        || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false)
                                        || (95<event.keyCode && event.keyCode<106)
                                        || (event.keyCode==8) || (event.keyCode==9)
                                        || (event.keyCode>34 && event.keyCode<40)
                                        || (event.keyCode==46) )">
                                <input type="text" class="otp-input" maxlength="1" onkeydown="return ( event.ctrlKey || event.altKey
                                        || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false)
                                        || (95<event.keyCode && event.keyCode<106)
                                        || (event.keyCode==8) || (event.keyCode==9)
                                        || (event.keyCode>34 && event.keyCode<40)
                                        || (event.keyCode==46) )">
                            </form>
                            <div class="text-center mt-5">
                                <button id="verify-btn" class="btn btn-read-more">Verify OTP</button>
                            </div>

                        </div>
                    </div>
                </div>


                <div id="thankyouMsg" class="mt-5">
                    <div class="form-container text-center">
                        <h2 class="section-heading mb-5 text-center">Thank You!</h2>

                        <div class="checkmark">
                            <svg viewBox="0 0 26 26" xmlns="http://www.w3.org/2000/svg">
                                <g stroke="currentColor" stroke-width="2" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
                                    <path class="circle" d="M13 1C6.372583 1 1 6.372583 1 13s5.372583 12 12 12 12-5.372583 12-12S19.627417 1 13 1z" />
                                    <path class="tick" d="M6.5 13.5L10 17 l8.808621-8.308621" />
                                </g>
                            </svg>
                        </div>
                        <p>Your OTP has been verified. You can now continue with your login.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


</main>

<style>

</style>


<script>
    const form = document.querySelector("#otp-form");
    const inputs = document.querySelectorAll(".otp-input");
    const verifyBtn = document.querySelector("#verify-btn");

    const isAllInputFilled = () => {
        return Array.from(inputs).every((item) => item.value);
    };

    const getOtpText = () => {
        let text = "";
        inputs.forEach((input) => {
            text += input.value;
        });
        return text;
    };

    const verifyOTP = () => {
        if (isAllInputFilled()) {
            const text = getOtpText();
            alert(`Your OTP is "${text}". OTP is correct`);
        }
    };

    const toggleFilledClass = (field) => {
        if (field.value) {
            field.classList.add("filled");
        } else {
            field.classList.remove("filled");
        }
    };

    form.addEventListener("input", (e) => {
        const target = e.target;
        const value = target.value;
        console.log({
            target,
            value
        });
        toggleFilledClass(target);
        if (target.nextElementSibling) {
            target.nextElementSibling.focus();
        }
        verifyOTP();
    });

    inputs.forEach((input, currentIndex) => {
        // fill check
        toggleFilledClass(input);

        // paste event
        input.addEventListener("paste", (e) => {
            e.preventDefault();
            const text = e.clipboardData.getData("text");
            console.log(text);
            inputs.forEach((item, index) => {
                if (index >= currentIndex && text[index - currentIndex]) {
                    item.focus();
                    item.value = text[index - currentIndex] || "";
                    toggleFilledClass(item);
                    verifyOTP();
                }
            });
        });

        // backspace event
        input.addEventListener("keydown", (e) => {
            if (e.keyCode === 8) {
                e.preventDefault();
                input.value = "";
                // console.log(input.value);
                toggleFilledClass(input);
                if (input.previousElementSibling) {
                    input.previousElementSibling.focus();
                }
            } else {
                if (input.value && input.nextElementSibling) {
                    input.nextElementSibling.focus();
                }
            }
        });
    });

    verifyBtn.addEventListener("click", () => {
        verifyOTP();
    });
</script>