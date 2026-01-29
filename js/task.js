//=====================================================================
//   function create html syntax for task component to render it
//=====================================================================
function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function createEl(type) {
    return document.createElement(type);
}

function createTask(id, sub, cas) {
    // main container
    let item = createEl("div");
    item.classList = "con-item gray-1 w-100 d-flex p-2 rounded-3 m-2 mx-0";

    // Check container
    let check = createEl("div");
    check.classList.add("check");
    let checkedIcon = createEl("i");
    if (cas === 1) {
        checkedIcon.classList = "far fa-check-circle";
    } else {
        checkedIcon.classList = "far fa-circle";
    }
    check.appendChild(checkedIcon);

    let checkbox = createEl("input");
    checkbox.type = "checkbox";
    checkbox.name = "case";
    checkbox.id = id;
    checkbox.value = cas;
    checkbox.classList = "case none";
    checkedIcon.appendChild(checkbox);

    // Sub container
    let subDiv = createEl("div");
    subDiv.classList = "sub";
    subDiv.type = "button";
    subDiv.dataset.bsToggle = "collapse";
    subDiv.dataset.bsTarget = `.sub${id}`;
    subDiv.setAttribute("aria-controls", `sub${id}`);
    subDiv.ariaExpanded = "false";

    let vertBar = createEl("span");
    vertBar.classList = "vert-bar";

    let subName = createEl("span");
    subName.classList = "sub-n";
    subName.id = `s${id}`;
    subName.innerText = sub;

    subDiv.appendChild(vertBar);
    subDiv.appendChild(subName);

    item.appendChild(check);
    item.appendChild(subDiv);

    // Tools container
    if (getCookie("auth_token")) {

        let tools = createEl("div");
        tools.classList = "con-tool";
        tools.id = `c${id}`;

        let editBtn = createEl("div");
        editBtn.classList = "edit_btn";
        editBtn.id = `e${id}`;
        editBtn.dataset.idp = `e${id}`;
        let editIcon = createEl("i");
        editIcon.classList = "fas fa-edit";
        editBtn.appendChild(editIcon);

        let deleteBtn = createEl("div");
        deleteBtn.classList = "btn_delete";
        deleteBtn.id = `${id}`;
        deleteBtn.dataset.idp = `${id}`;
        let deleteIcon = createEl("i");
        deleteIcon.classList = "far fa-times-circle";
        deleteBtn.appendChild(deleteIcon);

        tools.appendChild(editBtn);
        tools.appendChild(deleteBtn);
        item.appendChild(tools);

    }
    // Done button
    let doneBtn = createEl("div");
    doneBtn.classList = "done_btn none";
    doneBtn.dataset.idp = `d${id}`;
    doneBtn.id = `da${id}`;
    let doneIcon = createEl("i");
    doneIcon.classList = "fas fa-check";
    doneBtn.appendChild(doneIcon);

    // Append others to main container
    item.appendChild(doneBtn);

    return item;
}
