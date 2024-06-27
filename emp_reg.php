<?php
    session_start();
    $ad_username = $_SESSION["admin_username"];
    if(!$ad_username)  {
        echo '<script>window.alert("Login to the System First !!!"); window.location.href="admin_login.html"</script>';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="emp_reg.css">
    <title>Employee Admission</title>
    <style>
        .error {
            color: white;
            font-size: 15px;
        }
        .error-border {
            border-color: red;
        }
    </style>
</head>
<body>
    <div class="bg-image"></div>
    <div class="create_account">
        <form id="employeeForm" action="emp_sign_up.php" method="post">
            <br>
            <div class="heading">
                <label>Employee Admission</label>
            </div>
            <br>
        <footer>
            <div class="col1">
                <div class="fields1">
                    <input type="text" id="fullName" name="fullName" placeholder="Full Name" autofocus required><br>
                    <span id="fullNameError" class="error"></span><br>
                    <input type="text" id="address" name="address" placeholder="Residential Address" required><br>
                    <span id="addressError" class="error"></span><br>
                </div>
                <div class="drop_down">
                    <select id="state" name="state" class="state" required>
                        <option value="" disabled selected hidden>Select State</option>
                        <option>Andaman and Nicobar Islands</option>
                        <option>Andhra Pradesh</option>
                        <option>Arunachal Pradesh</option>
                        <option>Assam</option>
                        <option>Bihar</option>
                        <option>Chandigarh</option>
                        <option>Chhattisgarh</option>
                        <option>Dadra and Nagar Haveli and Daman And Diu</option>
                        <option>Delhi</option>
                        <option>Goa</option>
                        <option>Gujarat</option>
                        <option>Haryana</option>
                        <option>Himachal Pradesh</option>
                        <option>Jharkhand</option>
                        <option>Jammu and Kashmir</option>
                        <option>Ladakh</option>
                        <option>Lakshadweep</option>
                        <option>Karnataka</option>
                        <option>Kerala</option>
                        <option>Madhya Pradesh</option>
                        <option>Maharashtra</option>
                        <option>Manipur</option>
                        <option>Meghalaya</option>
                        <option>Mizoram</option>
                        <option>Nagaland</option>
                        <option>Odisha</option>
                        <option>Puducherry</option>
                        <option>Punjab</option>
                        <option>Rajasthan</option>
                        <option>Sikkim</option>
                        <option>Tamil Nadu</option>
                        <option>Telangana</option>
                        <option>Tripura</option>
                        <option>Uttarakhand</option>
                        <option>Uttar Pradesh</option>
                        <option>West Bengal</option>
                    </select>
                    <span id="stateError" class="error"></span>
                    <select id="district" name="district" class="district" required>
                        <option value="" disabled selected hidden>Select District</option>
                    </select>
                    <span id="districtError" class="error"></span> 
                    <input type="text" id="pinCode" name="pinCode" placeholder="Pin Code" required><br>
                    <span id="pinCodeError" class="error"></span><br>
                </div>
                <div class="fields2">
                    <div class="DOB">
                        <input type="text" id="dob" name="dob" placeholder="Date of Birth" onfocus="(this.type='Date')" onblur="(this.type='text')"><br>
                        <span id="dobError" class="error"></span><br>
                    </div>
                    <input type="text" id="mobile" name="mobile" placeholder="Mobile Number"><br>
                    <span id="mobileError" class="error"></span><br>
                    <input type="email" id="email" name="email" placeholder="Email Id" required><br>
                    <span id="emailError" class="error"></span><br>
                </div>

                <div class="fields3">
                    <input type="radio" value="Male" name="gender" id="male" required>
                    <label for="male">Male</label>
                    <input type="radio" value="Female" name="gender" id="female" required>
                    <label for="female">Female</label>
                    <span id="genderError" class="error"></span><br>
                </div>
            </div>
            <div class="col2">
                <div class="fields1">
                    <div class="DOB">
                        <select id="qualification" name="qualification" class="qual" required>
                            <option value="" disabled selected hidden>Qualification</option>
                            <option>Matriculation</option>
                            <option>Intermediate</option>
                            <option>Graduate</option>
                            <option>Post Graduate</option>
                            <option>Ph.D</option>
                        </select><br>
                        <span id="qualificationError" class="error"></span><br>
                        <input type="text" id="doj" name="doj" placeholder="Date of Joining" onfocus="(this.type='Date')" onblur="(this.type='text')"><br>
                        <span id="dojError" class="error"></span><br>
                    </div>
                </div>
                <div class="fields1">
                    <select id="govtId" name="govtId" class="govt_id" required>
                        <option value="" disabled selected hidden>Select Government ID</option>
                        <option>Aadhar</option>
                        <option>Driving Licence</option>
                        <option>Elector Photo Identity Card</option>
                        <option>PAN</option>
                    </select><br>
                    <span id="govtIdError" class="error"></span><br>
                    <input type="text" id="idNumber" name="idNumber" placeholder="ID Number" required><br>
                    <span id="idNumberError" class="error"></span><br>
                    <select id="designation" name="designation" class="designation" required>
                        <option value="" disabled selected hidden>Designation</option>
                        <option>Loco-Pilot</option>
                    </select><br>
                    <span id="designationError" class="error"></span><br>
                    <input type="password" id="password" name="password" placeholder="Create Password" required><br>
                    <span id="passwordError" class="error"></span><br>
                    <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required><br>
                    <span id="confirmPasswordError" class="error"></span><br>
                </div>
            </div>
        </footer>
            <div class="signup">
                <input type="submit" value="Save">
                <button type="button" onclick="location.href = 'admin_dashboard.php'" >Cancel</button>
                <br><br><br>
            </div>
        </form>
    </div>
    <script>

        
        document.getElementById('employeeForm').addEventListener('submit', function(event) {
            let isValid = true;

            // Full Name Validation
            const fullName = document.getElementById('fullName');
            const fullNameError = document.getElementById('fullNameError');
            if (fullName.value.trim() === '' || fullName.value.length > 50) {
                fullNameError.textContent = 'Full Name is required and should not exceed 50 characters.';
                fullName.classList.add('error-border');
                isValid = false;
            } else {
                fullNameError.textContent = '';
                fullName.classList.remove('error-border');
            }

            // Address Validation
            const address = document.getElementById('address');
            const addressError = document.getElementById('addressError');
            if (address.value.trim() === '' || address.value.length > 100) {
                addressError.textContent = 'Residential Address is required and should not exceed 100 characters.';
                address.classList.add('error-border');
                isValid = false;
            } else {
                addressError.textContent = '';
                address.classList.remove('error-border');
            }

            // Pin Code Validation
            const pinCode = document.getElementById('pinCode');
            const pinCodeError = document.getElementById('pinCodeError');
            if (pinCode.value.trim() === '' || !/^\d{6}$/.test(pinCode.value)) {
                pinCodeError.textContent = 'Valid Pin Code is required.';
                pinCode.classList.add('error-border');
                isValid = false;
            } else {
                pinCodeError.textContent = '';
                pinCode.classList.remove('error-border');
            }

            // Date of Birth Validation
            const dob = document.getElementById('dob');
            const dobError = document.getElementById('dobError');
            if (dob.value.trim() === '') {
                dobError.textContent = 'Date of Birth is required.';
                dob.classList.add('error-border');
                isValid = false;
            } else {
                dobError.textContent = '';
                dob.classList.remove('error-border');
            }

            // Mobile Number Validation
            const mobile = document.getElementById('mobile');
            const mobileError = document.getElementById('mobileError');
            if (mobile.value.trim() === '' || !/^\d{10}$/.test(mobile.value)) {
                mobileError.textContent = 'Valid Mobile Number is required.';
                mobile.classList.add('error-border');
                isValid = false;
            } else {
                mobileError.textContent = '';
                mobile.classList.remove('error-border');
            }

            // Date of Joining Validation
            const doj = document.getElementById('doj');
            const dojError = document.getElementById('dojError');
            if (doj.value.trim() === '') {
                dojError.textContent = 'Date of Joining is required.';
                doj.classList.add('error-border');
                isValid = false;
            } else {
                dojError.textContent = '';
                doj.classList.remove('error-border');
            }

            // ID Number Validation
            const idNumber = document.getElementById('idNumber');
            const idNumberError = document.getElementById('idNumberError');
            if (idNumber.value.trim() === '' || idNumber.value.length > 20) {
                idNumberError.textContent = 'ID Number is required and should not exceed 20 characters.';
                idNumber.classList.add('error-border');
                isValid = false;
            } else {
                idNumberError.textContent = '';
                idNumber.classList.remove('error-border');
            }

            // Password Validation
            const password = document.getElementById('password');
            const passwordError = document.getElementById('passwordError');
            if (password.value.trim() === '' || password.value.length < 8) {
                passwordError.textContent = 'Password is required and should be at least 8 characters long.';
                password.classList.add('error-border');
                isValid = false;
            } else {
                passwordError.textContent = '';
                password.classList.remove('error-border');
            }

            // Confirm Password Validation
            const confirmPassword = document.getElementById('confirmPassword');
            const confirmPasswordError = document.getElementById('confirmPasswordError');
            if (confirmPassword.value.trim() === '' || confirmPassword.value !== password.value) {
                confirmPasswordError.textContent = 'Passwords do not match.';
                confirmPassword.classList.add('error-border');
                isValid = false;
            } else {
                confirmPasswordError.textContent = '';
                confirmPassword.classList.remove('error-border');
            }

            if (!isValid) {
                event.preventDefault();
            }
        });

        document.getElementById('confirmPassword').addEventListener('input', function(event) {
            const confirmPassword = document.getElementById('confirmPassword');
            const confirmPasswordError = document.getElementById('confirmPasswordError');
            if (confirmPassword.value.trim() === '' || confirmPassword.value !== password.value) {
                confirmPasswordError.textContent = 'Passwords do not match.';
                confirmPassword.classList.add('error-border');
                isValid = false;
            } else {
                confirmPasswordError.textContent = '';
                confirmPassword.classList.remove('error-border');
            }
        });

        document.getElementById('password').addEventListener('input', function(event) {
            const password = document.getElementById('password');
            const passwordError = document.getElementById('passwordError');
            if (password.value.trim() === '' || password.value.length < 8) {
                passwordError.textContent = 'Password is required and should be at least 8 characters long.';
                password.classList.add('error-border');
                isValid = false;
            } else {
                passwordError.textContent = '';
                password.classList.remove('error-border');
            }
        });

        document.getElementById('idNumber').addEventListener('input', function(event) {
            const idNumber = document.getElementById('idNumber');
            const idNumberError = document.getElementById('idNumberError');
            if (idNumber.value.trim() === '' || idNumber.value.length > 20) {
                idNumberError.textContent = 'ID Number is required and should not exceed 20 characters.';
                idNumber.classList.add('error-border');
                isValid = false;
            } else {
                idNumberError.textContent = '';
                idNumber.classList.remove('error-border');
            }
        });

        document.getElementById('doj').addEventListener('input', function(event) {
            const doj = document.getElementById('doj');
            const dojError = document.getElementById('dojError');
            if (doj.value.trim() === '') {
                dojError.textContent = 'Date of Joining is required.';
                doj.classList.add('error-border');
                isValid = false;
            } else {
                dojError.textContent = '';
                doj.classList.remove('error-border');
            }
        }); 

        document.getElementById('mobile').addEventListener('input', function(event) {
            const mobile = document.getElementById('mobile');
            const mobileError = document.getElementById('mobileError');
            if (mobile.value.trim() === '' || !/^\d{10}$/.test(mobile.value)) {
                mobileError.textContent = 'Valid Mobile Number is required.';
                mobile.classList.add('error-border');
                isValid = false;
            } else {
                mobileError.textContent = '';
                mobile.classList.remove('error-border');
            }

        });

        document.getElementById('dob').addEventListener('input', function(event) {
            const dob = document.getElementById('dob');
            const dobError = document.getElementById('dobError');
            if (dob.value.trim() === '') {
                dobError.textContent = 'Date of Birth is required.';
                dob.classList.add('error-border');
                isValid = false;
            } else {
                dobError.textContent = '';
                dob.classList.remove('error-border');
            }
        });

        document.getElementById('pinCode').addEventListener('input', function(event) {
            const pinCode = document.getElementById('pinCode');
            const pinCodeError = document.getElementById('pinCodeError');
            if (pinCode.value.trim() === '' || !/^\d{6}$/.test(pinCode.value)) {
                pinCodeError.textContent = 'Valid Pin Code is required.';
                pinCode.classList.add('error-border');
                isValid = false;
            } else {
                pinCodeError.textContent = '';
                pinCode.classList.remove('error-border');
            }
        });

        document.getElementById('address').addEventListener('input', function(event) {
                        // Address Validation
                        const address = document.getElementById('address');
            const addressError = document.getElementById('addressError');
            if (address.value.trim() === '' || address.value.length > 100) {
                addressError.textContent = 'Residential Address is required and should not exceed 100 characters.';
                address.classList.add('error-border');
                isValid = false;
            } else {
                addressError.textContent = '';
                address.classList.remove('error-border');
            }
        });

        document.getElementById('fullName').addEventListener('input', function(event) {
            const fullName = document.getElementById('fullName');
            const fullNameError = document.getElementById('fullNameError');
            if (fullName.value.trim() === '' || fullName.value.length > 50) {
                fullNameError.textContent = 'Full Name is required and should not exceed 50 characters.';
                fullName.classList.add('error-border');
                isValid = false;
            } else {
                fullNameError.textContent = '';
                fullName.classList.remove('error-border');
            }
        });


        // Populate districts based on state selection
        const districts = {
            "Andaman and Nicobar Islands" : ["Nicobar","North and Middle Andaman","South Andaman" ],
                            "Andhra Pradesh": ["Anantapur", "Chittoor", "East Godavari", "Guntur", "Krishna", "Kurnool", "Nellore", "Prakasam", "Srikakulam", "Visakhapatnam", "Vizianagaram", "West Godavari", "Y.S.R. Kadapa"],
                            "Arunachal Pradesh": ["Tawang", "West Kameng", "East Kameng", "Papum Pare", "Kurung Kumey", "Kra Daadi", "Lower Subansiri", "Upper Subansiri", "West Siang", "East Siang", "Siang", "Upper Siang", "Lower Siang", "Lower Dibang Valley", "Dibang Valley", "Anjaw", "Lohit", "Namsai", "Changlang", "Tirap", "Longding"],
                            "Assam": ["Baksa","Barpeta", "Biswanath", "Bongaigaon", "Cachar", "Charaideo","Chirang","Darrang", "Dhemaji","Dhubri", "Dibrugarh", "Dima Hasao", "Goalpara", "Golaghat","Hailakandi","Hojai", "Jorhat","Kamrup","Kamrup Metropolitan","Karbi Anglong","Karimganj","Kokrajhar","Lakhimpur","Majuli","Morigaon","Nagaon","Nalbari", "Sivasagar","Sonitpur","South Salmara-Mankachar","Tinsukia","Udalguri","West Karbi Anglong"],
                            "Bihar" : ["Araria","Arwal","Aurangabad","Banka","Begusarai","Bhagalpur","Bhojpur","Buxar","Darbhanga","East Champaran (Motihari)","Gaya","Gopalganj","Jamui","Jehanabad","Kaimur (Bhabua)","Katihar","Khagaria","Kishanganj","Lakhisarai","Madhepura","Madhubani","Munger (Monghyr)","Muzaffarpur","Nalanda","Nawada","Patna","Purnia (Purnea)","Rohtas","Saharsa","Samastipur","Saran","Sheikhpura","Sheohar","Sitamarhi","Siwan","Supaul","Vaishali","West Champaran"],
                            "Chandigarh" : ["Chandigarh"],
                            "Chhattisgarh" : ["Balod","Baloda Bazar","Balrampur","Bastar","Bemetara","Bijapur","Bilaspur","Dantewada","Dhamtari","Durg","Gariaband","Janjgir-Champa","Jashpur","Kabirdham (Kawardha)","Kanker","Kondagaon","Korba","Koriya","Mahasamund","Mungeli","Narayanpur","Raigarh","Raipur","Rajnandgaon","Sukma","Surajpur","Surguja"],
                            "Dadra and Nagar Haveli and Daman And Diu" : ["Dadra and Nagar Haveli","Daman","Diu"],
                            "Delhi" : ["Central Delhi","East Delhi","New Delhi","North Delhi","North East Delhi","North West Delhi","Shahdara","South Delhi","South East Delhi","South West Delhi","West Delhi"],
                            "Goa" : ["North Goa","South Goa"],
                            "Gujarat" : ["Ahmedabad","Amreli","Anand","Aravalli","Banaskantha","Bharuch","Bhavnagar","Botad","Chhota Udaipur","Dahod","Dang","Devbhoomi Dwarka","Gandhinagar","Gir Somnath","Jamnagar","Junagadh","Kutch","Kheda","Mahisagar","Mehsana","Morbi","Narmada","Navsari","Panchmahal","Patan","Porbandar","Rajkot","Sabarkantha","Surat","Surendranagar","Tapi","Vadodara","Valsad"],
                            "Haryana" : ["Ambala","Bhiwani","Charkhi Dadri","Faridabad","Fatehabad","Gurugram","Hisar","Jhajjar","Jind","Kaithal","Karnal","Kurukshetra","Mahendragarh","Nuh","Palwal","Panchkula","Panipat","Rewari","Rohtak","Sirsa","Sonipat","Yamunanagar"],
                            "Himachal Pradesh" : ["Bilaspur","Chamba","Hamirpur","Kangra","Kinnaur","Kullu","Lahaul and Spiti","Mandi","Shimla","Sirmaur","Solan","Una"],
                            "Jharkhand": ["Bokaro","Chatra","Deoghar","Dhanbad","Dumka","East Singhbhum","Garhwa","Giridih","Godda","Gumla","Hazaribagh","Jamtara","Khunti","Koderma","Latehar","Lohardaga","Pakur","Palamu","Ramgarh","Ranchi","Sahibganj","Seraikela Kharsawan","Simdega","West Singhbhum"],
                            "Jammu and Kashmir" : ["Anantnag","Bandipora","Baramulla","Budgam","Doda","Ganderbal","Jammu","Kathua","Kishtwar","Kulgam","Kupwara","Poonch","Pulwama","Rajouri","Ramban","Reasi","Samba","Shopian","Srinagar","Udhampur"],
                            "Ladakh" : ["Leh","Kargil"],
                            "Lakshadweep": ["Lakshadweep"],
                            "Karnataka": ["Bagalkot","Ballari (Bellary)","Belagavi (Belgaum)","Bengaluru Rural","Bengaluru Urban","Bidar","Chamarajanagar","Chikballapur","Chikkamagaluru (Chikmagalur)","Chitradurga","Dakshina Kannada","Davangere","Dharwad","Gadag","Hassan","Haveri","Kalaburagi (Gulbarga)","Kodagu","Kolar","Koppal","Mandya","Mysuru (Mysore)","Raichur","Ramanagara","Shivamogga (Shimoga)","Tumakuru (Tumkur)","Udupi","Uttara Kannada (Karwar)","Vijayapura (Bijapur)","Yadgir"],
                            "Madhya Pradesh" : ["Agar Malwa","Alirajpur","Anuppur","Ashoknagar","Balaghat","Barwani","Betul","Bhind","Bhopal","Burhanpur","Chhatarpur","Chhindwara","Damoh","Datia","Dewas","Dhar","Dindori","Guna","Gwalior","Harda","Hoshangabad","Indore","Jabalpur","Jhabua","Katni","Khandwa","Khargone","Mandla","Mandsaur","Morena","Narsinghpur","Neemuch","Panna","Raisen","Rajgarh","Ratlam","Rewa","Sagar","Satna","Sehore","Seoni","Shahdol","Shajapur","Sheopur","Shivpuri","Sidhi","Singrauli","Tikamgarh","Ujjain","Umaria","Vidisha"],
                            "Maharashtra" : ["Ahmednagar","Akola","Amravati","Aurangabad","Beed","Bhandara","Buldhana","Chandrapur","Dhule","Gadchiroli","Gondia","Hingoli","Jalgaon","Jalna","Kolhapur","Latur","Mumbai City","Mumbai Suburban","Nagpur","Nanded","Nandurbar","Nashik","Osmanabad","Palghar","Parbhani","Pune","Raigad","Ratnagiri","Sangli","Satara","Sindhudurg","Solapur","Thane","Wardha","Washim","Yavatmal"],
                            "Manipur" : ["Bishnupur","Chandel","Churachandpur","Imphal East","Imphal West","Jiribam","Kakching","Kamjong","Kangpokpi","Noney","Pherzawl","Senapati","Tamenglong","Tengnoupal","Thoubal","Ukhrul"],
                            "Meghalaya" : ["East Garo Hills","East Jaintia Hills","East Khasi Hills","North Garo Hills","Ribhoi","South Garo Hills","South West Garo Hills","South West Khasi Hills","West Garo Hills","West Jaintia Hills","West Khasi Hills"],
                            "Mizoram" : ["Aizawl","Champhai","Kolasib","Lawngtlai","Lunglei","Mamit","Saiha","Serchhip"],
                            "Odisha" : ["Angul","Balangir","Balasore","Bargarh","Bhadrak","Boudh","Cuttack","Deogarh","Dhenkanal","Gajapati","Ganjam","Jagatsinghpur","Jajpur","Jharsuguda","Kalahandi","Kandhamal","Kendrapara","Kendujhar (Keonjhar)","Khordha","Koraput","Malkangiri","Mayurbhanj","Nabarangpur","Nayagarh","Nuapada","Puri","Rayagada","Sambalpur","Subarnapur (Sonepur)","Sundargarh"],
                            "Nagaland" : ["Dimapur","Kiphire","Kohima","Longleng","Mokokchung","Mon","Peren","Phek","Tuensang","Wokha","Zunheboto"],
                            "Puducherry" : ["Puducherry","Karaikal","Mahe","Yanam"],
                            "Punjab" : ["Amritsar","Barnala","Bathinda","Faridkot","Fatehgarh Sahib","Fazilka","Ferozepur","Gurdaspur","Hoshiarpur","Jalandhar","Kapurthala","Ludhiana","Mansa","Moga","Muktsar","Pathankot","Patiala","Rupnagar (Ropar)","Sahibzada Ajit Singh Nagar (Mohali)","Sangrur","Shahid Bhagat Singh Nagar (Nawanshahr)","Sri Muktsar Sahib","Tarn Taran"],
                            "Rajasthan" : ["Ajmer","Alwar","Banswara","Baran","Barmer","Bharatpur","Bhilwara","Bikaner","Bundi","Chittorgarh","Churu","Dausa","Dholpur","Dungarpur","Hanumangarh","Jaipur","Jaisalmer","Jalore","Jhalawar","Jhunjhunu","Jodhpur","Karauli","Kota","Nagaur","Pali","Pratapgarh","Rajsamand","Sawai Madhopur","Sikar","Sirohi","Sri Ganganagar","Tonk","Udaipur"],
                            "Sikkim" : ["East Sikkim","North Sikkim","South Sikkim","West Sikkim"],
                            "Kerala" : ["Alappuzha","Ernakulam","Idukki","Kannur","Kasaragod","Kollam","Kottayam","Kozhikode","Malappuram","Palakkad","Pathanamthitta","Thiruvananthapuram","Thrissur","Wayanad"],
                            "Tamil Nadu" : ["Ariyalur","Chengalpattu","Chennai","Coimbatore","Cuddalore","Dharmapuri","Dindigul","Erode","Kallakurichi","Kanchipuram","Kanyakumari","Karur","Krishnagiri","Madurai","Mayiladuthurai","Nagapattinam","Namakkal","Nilgiris","Perambalur","Pudukkottai","Ramanathapuram","Ranipet","Salem","Sivaganga","Tenkasi","Thanjavur","Theni","Thoothukudi","Tiruchirappalli","Tirunelveli","Tirupathur","Tiruppur","Tiruvallur","Tiruvannamalai","Tiruvarur","Vellore","Viluppuram","Virudhunagar"],
                            "Telangana" : ["Adilabad","Bhadradri Kothagudem","Hyderabad","Jagtial","Jangaon","Jayashankar Bhupalapally","Jogulamba Gadwal","Kamareddy","Karimnagar","Khammam","Komaram Bheem","Mahabubabad","Mahabubnagar","Mancherial","Medak","Medchal-Malkajgiri","Nagarkurnool","Nalgonda","Nirmal","Nizamabad","Peddapalli","Rajanna Sircilla","Ranga Reddy","Sangareddy","Siddipet","Suryapet","Vikarabad","Wanaparthy","Warangal Rural","Warangal Urban","Yadadri Bhuvanagiri"],
                            "Tripura" : ["Dhalai","Gomati","Khowai","North Tripura","Sepahijala","South Tripura","Unakoti","West Tripura"],
                            "Uttarakhand" : ["Almora","Bageshwar","Chamoli","Champawat","Dehradun","Haridwar","Nainital","Pauri Garhwal","Pithoragarh","Rudraprayag","Tehri Garhwal","Udham Singh Nagar","Uttarkashi"],
                            "Uttar Pradesh" : ["Agra","Aligarh","Allahabad","Ambedkar Nagar","Amethi","Amroha","Auraiya","Azamgarh","Baghpat","Bahraich","Ballia","Balrampur","Banda","Barabanki","Bareilly","Basti","Bijnor","Budaun","Bulandshahr","Chandauli","Chitrakoot","Deoria","Etah","Etawah","Faizabad","Farrukhabad","Fatehpur","Firozabad","Gautam Buddh Nagar","Ghaziabad","Ghazipur","Gonda","Gorakhpur","Hamirpur","Hapur","Hardoi","Hathras","Jalaun","Jaunpur","Jhansi","Kannauj","Kanpur Dehat","Kanpur Nagar","Kasganj","Kaushambi","Kushinagar","Lakhimpur Kheri","Lalitpur","Lucknow","Maharajganj","Mahoba","Mainpuri","Mathura","Mau","Meerut","Mirzapur","Moradabad","Muzaffarnagar","Pilibhit","Pratapgarh","Raebareli","Rampur","Saharanpur","Sambhal","Sant Kabir Nagar","Shahjahanpur","Shamli","Shravasti","Siddharthnagar","Sitapur","Sonbhadra","Sultanpur","Unnao","Varanasi"],
                            "West Bengal" : ["Alipurduar","Bankura","Birbhum","Cooch Behar","Dakshin Dinajpur","Darjeeling","Hooghly","Howrah","Jalpaiguri","Jhargram","Kalimpong","Kolkata","Malda","Murshidabad","Nadia","North 24 Parganas","Paschim Bardhaman","Paschim Medinipur","Purba Bardhaman","Purba Medinipur","Purulia","South 24 Parganas","Uttar Dinajpur"],

        };

        function populateDistricts() {
            const stateSelect = document.getElementById('state');
            const districtSelect = document.getElementById('district');
            const selectedState = stateSelect.value;

            districtSelect.innerHTML = '<option value="" disabled hidden selected>Select District</option>';

            if (districts[selectedState]) {
                districts[selectedState].forEach(function(district) {
                    const option = document.createElement('option');
                    option.text = district;
                    option.value = district;
                    districtSelect.add(option);
                });
            }
        }

        document.getElementById('state').addEventListener('change', populateDistricts);
        window.addEventListener('load', populateDistricts);
    </script>
</body>
</html>
