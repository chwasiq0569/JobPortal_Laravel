console.log("APP.JS")

// var skills = []
function valudateFORM() {
    var saveButton = document.getElementById("PDFORM_Save_Btn_1");
    document.querySelectorAll(".PDFORM_FIELD_1").forEach(function (element) {
        element.addEventListener("keyup", function () {
            var anyFieldLessThan3 = Array.from(document.querySelectorAll(".PDFORM_FIELD_1"))
                .some(function (field) {
                    return field.value.length < 3;
                });
            if (saveButton) {
                saveButton.style.display = anyFieldLessThan3 ? "none" : "block";
            }
            if (document.getElementById("fieldsErrorMessage")) {
                document.getElementById("fieldsErrorMessage").style.display = anyFieldLessThan3 ? "block" : "none";
            }
        });
        if (saveButton) {
            saveButton.style.display = skills.length < 1 ? "none" : "block";
        }
        if (document.getElementById("fieldsErrorMessage")) {
            document.getElementById("fieldsErrorMessage").style.display = skills.length < 1 ? "block" : "none";
        }
    });
}


function searchableDropdown() {
    var searchInput = document.getElementById("searchInput");
    var optionList = document.getElementById("optionList");
    var options = optionList.getElementsByClassName("option");

    optionList.style.display = 'none'

    searchInput.addEventListener("input", function () {
        optionList.style.display = 'block'
        var searchValue = searchInput.value.toLowerCase();
        for (var i = 0; i < options.length; i++) {
            var optionText = options[i].textContent.toLowerCase();
            if (optionText.indexOf(searchValue) > -1) {
                options[i].style.display = "block";
            } else {
                options[i].style.display = "none";
            }
        }
        optionList.style.display = "block";
    });

    for (var i = 0; i < options.length; i++) {
        options[i].addEventListener("click", function () {
            searchInput.value = this.textContent;

            optionList.style.display = "none";
        });
    }

    document.addEventListener("click", function (event) {
        if (event.target != searchInput) {
            optionList.style.display = "none";
        }
    });
}

function btnStatus() {
    if (document.getElementById("addSkill")) {
        if (skills.length < 5) {
            document.getElementById("addSkill").style.pointerEvents = "auto"
            document.getElementById("addSkill").style.opacity = "1"
            document.getElementById("addSkill").style.cursor = "pointer"
        } else {
            document.getElementById("addSkill").style.pointerEvents = "none"
            document.getElementById("addSkill").style.opacity = "0.6"
            document.getElementById("addSkill").style.cursor = "not-allowed"
        }
    }
}

function renderSkills() {
    btnStatus()

    // Render the skills list
    if (document.getElementById("skillsList")) {
        document.getElementById("skillsList").innerHTML = skills.map((skill, id) => "<div id='" + skill + "' class='skillItem'><p>" + skill + "</p><img id='" + skill + "' class='deleteicon' src='./crossicon.png' /></div>").join("");
    }

    valudateFORM()

    // Attach event listener to each delete icon
    skills.forEach((skill, id) => {
        if (document.getElementById('' + skill)) {
            document.getElementById('' + skill).addEventListener("click", function (e) {

                console.log("CLICKED")
                // Remove the skill from the skills array
                skills.splice(id, 1);
                // Re-render the skills list

                renderSkills();

            });
        }
    });
}
function skillsFunctionality() {
    if (document.getElementById("addSkill")) {

        document.getElementById("addSkill").addEventListener("click", () => {
            valudateFORM()

            const newSkill = document.getElementById("skillsInput").value.trim();
            if (newSkill.length > 0 && !skills.includes(newSkill)) {
                skills.push(newSkill);
            }
            document.getElementById("skillsArray").value = JSON.stringify(skills.filter(value => value !== ""));
            document.getElementById("skillsInput").value = "";
            renderSkills();
        });
    }
}

if (document.getElementById('personalDetailsFORM')) {
    document.getElementById('personalDetailsFORM').addEventListener('submit', function (e) {
        // Prevent the form from submitting

        e.preventDefault();

        document.getElementById("skillsArray").value = JSON.stringify(skills.filter(value => value !== ""));
        // Now, submit the form.
        e.target.submit();
    });
}
searchableDropdown()
skillsFunctionality()
