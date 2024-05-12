const abc = [
  "A",
  "B",
  "C",
  "D",
  "E",
  "F",
  "G",
  "H",
  "i",
  "j",
  "k",
  "l",
  "m",
  "n",
  "o",
  "p",
  "q",
  "r",
  "s",
  "t",
  "u",
  "v",
  "w",
  "x",
  "y",
  "z",
];
// const allTables = document.querySelectorAll("table");
// const all_years = document.querySelectorAll(".each_year");
const all_btn_change_solo = document.querySelectorAll(".btn_change_solo");
const total_rooms = document.querySelector("#total_rooms");
const total_sections = document.querySelector("#total_sections");
const free_classrooms = document.querySelector("#free_classrooms");
const add_btns = document.querySelectorAll(".add_btn");
const parent_content = document.querySelector(".content");
const wrapper = document.querySelector(".content-wrapper");
const btn_save = document.querySelector("#btn_save");
const history = [];
let now_history = "";
const yearSelect = document.querySelector("#yearInput");
let data = { arrYears: [], total_rooms: "" };
let restaurando = false;
const all_tr = document.querySelectorAll("tr");
const inscribeForm = document.querySelector("form.inscribe");


const local_storage_data = JSON.parse(localStorage.getItem("sections_data"));
if (local_storage_data !== null) {
  const span_btn = document.createElement("span");
  span_btn.classList.add("parent_btn_submit");
  span_btn.innerHTML = `<button class="btn_submit mt-1" id="restaurar">restaurar</button>`;

  $(document).Toasts("create", {
    title: "Existen cambios sin guardar",
    body: `¿Desea volver a donde estaba?`,
  });
  document.querySelector(".toast-body").append(span_btn);
  data = local_storage_data;
}

function saveHistory() {
  // localStorage.setItem("sections_data", JSON.stringify(getDataStudents()));
  let content = document.querySelector("#content_itself");
  if (now_history < history.length - 1) {
    history.splice(
      now_history + 1,
      history.length - (now_history + 1),
      content.outerHTML
    );
  } else {
    history.push(content.outerHTML);
  }
  // history.push(content.outerHTML)
  now_history = history.length - 1;
  if (now_history > 25) history.shift();
  now_history = history.length - 1;
  // if (now_history < 1) past.classList.add("disabled");
}
setTimeout(() => {
  saveHistory();
  // localStorage.setItem("sections_data", JSON.stringify(getDataStudents()));
}, 500);

function moveHistory() {
  const section = document.createElement("section");
  section.classList.add("content");
  section.innerHTML = history[now_history];
  wrapper.replaceChild(section, document.querySelector(".content"));
  document.querySelectorAll("table").forEach((table) => {
    $(`table[data-section="${table.dataset.section}"`).DataTable({
      responsive: true,
      showCheckboxColumn: false,
      lengthChange: false,
      autoWidth: false,
      paging: false,
      ordering: true,
      columnDefs: [
        {
          orderable: false, // set orderable false for selected columns
          targets: [0, 1], // column index (start from 0)
          content: "",
          select: false, 
        },
      ],
    });
  });
}

function updateNroStudents(section, year, print = true) {
  const n_students = $(
    `.each_year[data-year="${year}"] table[data-section="${section}"]`
  )
    .DataTable()
    .data()
    .rows()
    .count();
  if (print == true) {
    document.querySelector(
      `.each_year[data-year="${year}"] .matricule[data-section="${section}"]`
    ).textContent = n_students;
  }
  return n_students;
}

function addDeleteIcon() {
  const year = yearSelect.value;
  const n_sections = document.querySelector(
    `.each_year[data-year="${year}"] .nSectionsByYear`
  ).textContent;
  const actual_delete_icon = document.querySelector(
    `.each_year[data-year="${year}"] .delete_icon`
  );
  if (actual_delete_icon) {
    actual_delete_icon.remove();
  }
  if (n_sections > 1) {
    const delete_icon = document.createElement("i");
    delete_icon.classList.add("ml-3", "delete_icon", "fas", "fa-trash-can");
    delete_icon.title = "Eliminar sección";
    delete_icon.dataset.year = year;
    delete_icon.dataset.section = `${abc[n_sections - 1]}`;
    document
      .querySelectorAll(`.each_year[data-year="${year}"] .each_section h4`)
      [n_sections - 1].append(delete_icon);
  }

  // delete_icons.forEach(delete_icon => {
  // 	delete_icon.classList.add('d-none')
  // })
  // delete_icons[delete_icons.length-1].classList.remove('d-none')
}

addDeleteIcon();

function newTable(year, section) {
  return `
	
		
            <div class="mx-auto each_section_header">
                <h4 class="h5">Sección ${year}${section}</h4>
                <p>matricula: <b class="matricule" data-section="${section}">0</b></p>
            </div>
        
        <div class="table-responsive" >
            
            <table data-section="${section}" data-year="${year}" class="table display position-relative table-head-fixed text-nowrap table-striped table-bordered">
                
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th>Nombres </th>
                        <th>Apellidos</th>
                        <th>Foto</th>
                        <th>Cedula</th>
                        <th>Edad</th>
                        <th>Tel del representante</th>
                        <th>correo</th>
                        <th data-priority="1">acción</th>
                    </tr>
                </thead>
                <tbody>

                    
                </tbody>
			</table>
		</div>
	
`;
}

let selected_for_change_one = {};
let tables_selected = [];

const change_box = document.querySelector(`.change_box`);
// const select = change_box.querySelector(`select`);

let status_change_box = 0;

// function to get the data of all students
function getDataStudents(section, id = "", status = "") {
  if (
    JSON.parse(localStorage.getItem("sections_data")) !== null &&
    restaurando === false
  ) {
    data = { arrYears: [], total_rooms: "" };
    localStorage.removeItem("sections_data");
    restaurando = true;
  }
  const actual_year = +yearSelect.value;
  const isYearThere = data.arrYears.findIndex(
    (obj) => obj.year === +actual_year
  );

  data.total_rooms = total_rooms.value;
  if (status == "change_amount") return data;
  if (isYearThere >= 0) {
    if (status === "changed") {
      for (const eachSection in data.arrYears[isYearThere].sections) {
        data.arrYears[isYearThere].sections[eachSection] = data.arrYears[
          isYearThere
        ].sections[eachSection].filter((val) => val !== id);
      }
      if (section in data.arrYears[isYearThere].sections) {
        data.arrYears[isYearThere].sections[`${section}`].push(id);
      } else {
        data.arrYears[isYearThere].sections[`${section}`] = [id];
      }
    } else {
      data.arrYears[isYearThere].sections[`${section}`] = [status];
    }
  } else {
    const new_year = {
      year: actual_year,
      sections: { [`${section}`]: [status === "changed" ? id : status] },
    };

    data.arrYears.push(new_year);
  }

  document.querySelector("#toastsContainerTopRight")?.remove();
  return data;
}
let id_student = null
document.querySelector("body").onclick = (e) => {
  const el = e.target;

   if (id_student !== null && el.closest('tr') == null) {
       change_box.classList.add("d-none");
       change_box.classList.remove("d-block");
       id_student = null
       console.log('aplico');
        document.querySelector('tr.active')?.classList.remove('active');
      
       return
   }

  
   // event: click on a row to  open options icons ************************************+
   if (el.tagName == "TD") {
    console.log('click')
    id_student = 3

    change_box.classList.add("d-block");
    change_box.classList.remove("d-none");
    change_box.classList.remove("position-fixed");
    document.querySelector('tr.active')?.classList.remove('active');
    
    let tr = el.closest("tr");
    tr.classList.add('active')


    change_box.style.top = `${
      window.pageYOffset + el.getBoundingClientRect().top - 55
    }px`;
    change_box.style.left = `${
      window.pageXOffset + el.getBoundingClientRect().left - 37
    }px`;
  }

  if (el.classList.contains("nav-link")) {
    const table = $(`table[data-section="${el.textContent}"`).DataTable();
    setTimeout(() => {
      table.responsive.recalc();
    }, 50);
  }
  if (
    !el.classList.contains("btn_change_solo") &&
    el.closest(".tooltip_child") != change_box &&
    !btn_change_all.classList.contains("active")
  ) {
    change_box.classList.remove("d-block");
    status_change_box = 0;
    selected_for_change_one.tr?.querySelector("i").classList.remove("color-4");
  }

  //btn guardar
  if (el.id === "btn_save") {

    //after saving in DB do this: (delete local and reset data)
    localStorage.removeItem("sections_data");
    data = {}
  }

  // event: click on crear una nueva sección ************************************+
  if (el.classList.contains("add_btn")) {
    addNewSection(yearSelect.value);
  }

  // event: click on icon change section
  if (el.classList.contains("btn_change_solo")) {
    change_box.classList.add("d-block");
    change_box.classList.remove("position-fixed");

    change_box.style.top = `${
      window.pageYOffset + el.getBoundingClientRect().top - 110
    }px`;
    // change_box = change_box;
    // const selected_table = el.closest('table')
    const actual_table = el.closest("table");
    // const actual_year = actual_table.dataset.year;

    all_btn_change_solo.forEach((i) => i.classList.remove("color-4"));
    el.classList.add("color-4");
    btn_change_all.classList.remove("active");

    UpdateOptionsSections();
    selected_for_change_one = {
      table_section: actual_table.dataset.section,
      tr: el.closest("tr"),
    };
    // const isThere = tables_selected.findIndex(obj => obj.table == selected_table)
    // if (isThere != -1) {
    // 	tables_selected[isThere].students.push(el.closest('tr'))
    // } else {
    // 	tables_selected.push({table: selected_table, students: [el.closest('tr')]})
    // }
  }

  // event: click on a acpet change
  if (el.classList.contains("btn_change_acept")) {
    if (btn_change_all.classList.contains("active")) {
      let first =
        tables_selected[0].students[0].querySelectorAll("td")[2].textContent;
      let nro_students = 0;

      tables_selected.forEach((obj) => {
        console.log(obj);
        let origin = $(
          `.each_year[data-year="${yearSelect.value}"] table[data-section="${obj.table_section}"`
        ).DataTable();

        let new_data = origin.rows(obj.students).data();
        nro_students += obj.students.length;
        let destiny_table = $(
          `.each_year[data-year="${yearSelect.value}"] table[data-section="${select.value}"`
        ).DataTable();
        destiny_table.rows.add(new_data).draw();
        origin.rows(obj.students).remove().draw();

        change_box.classList.remove("d-block");
        btn_change_all.classList.add("d-none");
        btn_change_all.classList.remove("active");
        updateNroStudents(obj.table_section, yearSelect.value);
        updateNroStudents(select.value, yearSelect.value);

        tables_selected = [];
        check_selected_in_year = false;
        obj.id.forEach((id) => {
          localStorage.setItem(
            "sections_data",
            JSON.stringify(getDataStudents(select.value, id, "changed"))
          );
        });
      });
      // if (nro_students > 1) toastr.success(`Se cambió a ${first} a la sección ${select.value}`)
      // else
      if (nro_students == 1) {
        toastr.success(`Se cambió a ${first} a la sección ${select.value}`);
      } else if (nro_students == 2) {
        toastr.success(
          `Se cambió a ${first} y un estudiante más a la sección ${select.value}`
        );
      } else {
        toastr.success(
          `Se cambió a ${first} y ${--nro_students} estudiantes más a la sección ${
            select.value
          }`
        );
      }
      btn_save.classList.remove("d-none");
    } else {
      const origin_table = $(
        `.each_year[data-year="${yearSelect.value}"] table[data-section="${selected_for_change_one.table_section}"`
      ).DataTable();
      const trSpan = selected_for_change_one.tr.querySelector(`[data-id]`);
      const name_student = trSpan.textContent;
      let new_data = origin_table.row(selected_for_change_one.tr).data();
      let destiny_table = $(
        `.each_year[data-year="${yearSelect.value}"] table[data-section="${select.value}"`
      ).DataTable();
      destiny_table.row.add(new_data).draw();
      change_box.classList.remove("d-block");
      localStorage.setItem(
        "sections_data",
        JSON.stringify(
          getDataStudents(select.value, trSpan.dataset.id, "changed")
        )
      );
      toastr.success(
        `Se cambió a ${name_student} a la sección ${select.value}`
      );

      // selected_for_change_one.table.a(status_change_box)
      origin_table.row(selected_for_change_one.tr).remove().draw();
      updateNroStudents(
        selected_for_change_one.table_section,
        yearSelect.value
      );
      updateNroStudents(select.value, yearSelect.value);
      selected_for_change_one = {};
      btn_save.classList.remove("d-none");
    }

    saveHistory();
  }

  // Click on acept multiple students for change of sections ****************************************
  if (el.classList.contains("btn_change_all")) {
    change_box.style.top = `${el.getBoundingClientRect().top - 110}px`;
    change_box.classList.add("position-fixed");
    btn_change_all.classList.toggle("active");

    if (btn_change_all.classList.contains("active")) {
      change_box.classList.add("d-block");
    } else {
      change_box.classList.remove("d-block");
    }
    UpdateOptionsSections();
    saveHistory();
    // localStorage.setItem("sections_data", JSON.stringify(getDataStudents()));
  }

  // delete a section *******************************************************
  if (el.classList.contains("delete_icon")) {
    const data_table = $(
      `.each_year[data-year="${yearSelect.value}"] table[data-section="${el.dataset.section}"]`
    ).DataTable();
    const n_students = data_table.data().rows().count();
    // const n_sections = --document.querySelector(`.add_btn[data-year="${el.dataset.year}"]`).dataset.nsections

    if (n_students > 0) {
      for (let i = 0; i < n_students; i++) {
        const div_sections = [
          ...document.querySelectorAll(
            `.each_year[data-year="${yearSelect.value}"] .matricule`
          ),
        ].map((b) => b.textContent + b.dataset.section);
        div_sections.pop();
        const section = div_sections.sort()[0].substring(1);
        const row = data_table.row(i).data();
        const id_student = data_table.row(i).node().querySelector("[data-id]")
          .dataset.id;
        const destiny_table = $(
          `.each_year[data-year="${yearSelect.value}"] table[data-section="${section}"]`
        ).DataTable();
        destiny_table.row.add(row).draw();
        updateNroStudents(section, yearSelect.value);
        localStorage.setItem(
          "sections_data",
          JSON.stringify(getDataStudents(section, id_student, "changed"))
        );
      }
    }

    document
      .querySelector(
        `.each_year[data-year="${yearSelect.value}"] article[data-section="${el.dataset.section}"]`
      )
      .remove();
    document
      .querySelector(
        `.each_year[data-year="${yearSelect.value}"] .sections_nav a.active`
      )
      .remove();
    --document.querySelector(
      `.each_year[data-year="${yearSelect.value}"] .nSectionsByYear`
    ).textContent;
    --total_sections.textContent;
    ++free_classrooms.textContent;

    addDeleteIcon();
    saveHistory();
    // localStorage.setItem("sections_data", JSON.stringify(getDataStudents()));
    localStorage.setItem(
      "sections_data",
      JSON.stringify(getDataStudents(el.dataset.section, "", "deleted"))
    );

    toastr.success(
      `Se ha eliminado la sección ${
        yearSelect.value + el.dataset.section
      } exitosamente`
    );
    btn_save.classList.remove("d-none");
  }

  if (el.id == "restaurar") {
    restaurando = true;
    total_rooms.value = local_storage_data.total_rooms;
    local_storage_data.arrYears.forEach((obj) => {
      const year_div = document.querySelector(`[data-year="${obj.year}"`);

      for (const each_section in obj.sections) {
        if (
          obj.sections[each_section][0] === "created" &&
          !document.querySelector(
            `[data-year="${obj.year}"] [data-section="${each_section}"]`
          )
        ) {
          addNewSection(obj.year, false);
        }

        obj.sections[each_section].forEach((student_id) => {
          console.log(student_id);
          if (isNaN(student_id)) {
            return;
          }
          const span = document.querySelector(`[data-id="${student_id}"]`);
          const tr = span.closest("tr");
          const origin_table = span.closest("table");
          const origin_section = origin_table.dataset.section;
          const origin_dataTable = $(origin_table).DataTable();
          const data_student = origin_dataTable.row(tr).data();

          const destiny_table = $(
            `.each_year[data-year="${obj.year}"] table[data-section="${each_section}"`
          ).DataTable();
          destiny_table.row.add(data_student).draw().responsive.recalc();
          origin_dataTable.row(tr).remove().draw();
          updateNroStudents(each_section, obj.year);
          updateNroStudents(origin_section, obj.year);
        });
      }

      for (const each_section in obj.sections) {
        if (
          obj.sections[each_section][0] === "deleted" &&
          document.querySelector(
            `[data-year="${obj.year}"] [data-section="${each_section}"]`
          )
        ) {
          // deleteSection(obj.year, false);
          console.log(each_section);
          document
            .querySelector(
              `.each_year[data-year="${obj.year}"] article[data-section="${each_section}"]`
            )
            .remove();
          document
            .querySelector(`.sections_nav [href="#${each_section + obj.year}"]`)
            .remove();

          --document.querySelector(
            `.each_year[data-year="${obj.year}"] .nSectionsByYear`
          ).textContent;
          --total_sections.textContent;
          ++free_classrooms.textContent;

          addDeleteIcon();
        }
      }
    });

    document.querySelector("#toastsContainerTopRight").remove();
    btn_save.classList.remove("d-none");

  }
  if (el == document.querySelector(`#toastsContainerTopRight span`)){
    console.log('ayyy nojoda')
    localStorage.removeItem("sections_data");

  }
};
// </ ---------- finish click on body
const btn_change_all = document.querySelector(".btn_change_all");
let check_selected_in_year = false;

document.onchange = (e) => {
  const el = e.target;

  if (el == total_rooms) {
    free_classrooms.textContent =
      total_rooms.value - total_sections.textContent;
    localStorage.setItem(
      "sections_data",
      JSON.stringify(getDataStudents("", "", "change_amount"))
    );
  }

  if (el === yearSelect) {
    addDeleteIcon();
    document.querySelector(`.each_year.active`).classList.remove("active");
    document
      .querySelector(`.each_year[data-year="${yearSelect.value}"]`)
      .classList.add("active");
    const table = $(`.each_section.active table`).DataTable();
    setTimeout(() => {
      table.responsive.recalc();
    }, 50);

    // clean students selected for the other year
    if (
      yearSelect.value != check_selected_in_year &&
      check_selected_in_year != false
    ) {
      change_box.classList.remove("d-block");
      btn_change_all.classList.add("d-none");
      btn_change_all.classList.remove("active");
      tables_selected = [];
      document
        .querySelectorAll(
          `.each_year[data-year="${check_selected_in_year}"] input[type=checkbox]`
        )
        .forEach((check) => {
          check.checked = false;
          check.closest("tr").classList.remove("active");
        });
    }
  }

  if (el.type === "checkbox") {
    const selected_table = el.closest("table");

    const allCheckboxOfSelectedYear = document.querySelectorAll(
      `.each_year[data-year="${yearSelect.value}"] input[type=checkbox]`
    );
    const tr = el.closest("tr");

    tr.classList.toggle("active");
    const isThere = tables_selected.findIndex(
      (obj) => obj.table_section == selected_table.dataset.section
    );
    if (el.checked === true) {
      if (isThere != -1) {
        tables_selected[isThere].students.push(el.closest("tr"));
        tables_selected[isThere].id.push(
          tr.querySelector("[data-id]").dataset.id
        );
      } else {
        tables_selected.push({
          table_section: selected_table.dataset.section,
          students: [el.closest("tr")],
          id: [tr.querySelector("[data-id]").dataset.id],
        });
      }
      check_selected_in_year = yearSelect.value;
    } else {
      const indexDelete = tables_selected[isThere].students.indexOf(tr);
      if (indexDelete != -1)
        tables_selected[isThere].students.splice(indexDelete, 1);
    }

    if (
      [...allCheckboxOfSelectedYear].find(
        (checkbox) => checkbox.checked == true
      )
    ) {
      btn_change_all.classList.remove("d-none");
    } else {
      change_box.classList.remove("d-block");
      btn_change_all.classList.add("d-none");
      btn_change_all.classList.remove("active");
      tables_selected = [];
      check_selected_in_year = false;
    }
  }
};

function UpdateOptionsSections() {
  const n_sections = document.querySelector(
    `[data-year="${yearSelect.value}"] .nSectionsByYear`
  ).textContent;
  const optionsFragment = document.createDocumentFragment();
  for (let i = 0; i < n_sections; i++) {
    const optionElement = document.createElement("option");
    optionElement.textContent = `${abc[i]}`;
    optionsFragment.append(optionElement);
  }
  select.replaceChildren(optionsFragment);
}

//  shortcuts
document.addEventListener("keydown", (e) => {
  // to go back
  if (e.key.toLowerCase() === "z" && e.ctrlKey) {
    if (now_history > 0) {
      e.preventDefault();
      now_history--;
      moveHistory();
    }
  }
  // to go next
  if (e.key.toLowerCase() === "y" && e.ctrlKey) {
    e.preventDefault();
    if (now_history < history.length - 1) {
      now_history++;
      moveHistory();
    }
  }
});

function addNewSection(year, saveInLocal = true) {
  if (total_rooms.value - total_sections.textContent > 0) {
    const year_div = document.querySelector(`.each_year[data-year="${year}"]`);
    const section = abc[year_div.querySelector(`.nSectionsByYear`).textContent];
    
    const article = document.createElement("article");
    year_div.querySelector(".tab-pane.active")?.classList.remove("active");
    year_div
      .querySelector(".sections_nav a.active")
      ?.classList.remove("active");
    article.classList.add("each_section", "tab-pane", "active");
    article.id = section + year;
    article.dataset.section = section;

    const li = document.createElement("li");
    li.classList.add("nav-item");
    li.innerHTML = `
    <a class="nav-link active" href="#${section+year}" data-toggle="tab">${section}</a>
    `;
    year_div.querySelector(`.sections_nav`).append(li);
    // console.log(document.querySelector('.sections_nav'))
    article.innerHTML = newTable(year, section);
    year_div.querySelector(`.tab-content`).append(article);

    $(
      `.each_year[data-year="${year}"] table[data-section="${section}"`
    ).DataTable({
      responsive: true,
      lengthChange: false,
      autoWidth: false,
      paging: false,
      ordering: true,
      columnDefs: [
        {
          orderable: false, // set orderable false for selected columns
          targets: [0, 1], // column index (start from 0)
          content: "",
        },
      ],
    });

    let nSections = ++year_div.querySelector(`.nSectionsByYear`).textContent;
    year_div.querySelector(`.nSectionsByYear`).textContent = nSections;
    UpdateOptionsSections();
    ++total_sections.textContent;
    free_classrooms.textContent =
      total_rooms.value - total_sections.textContent;

    addDeleteIcon();
    saveHistory();
    // update data
    if (saveInLocal) {
      localStorage.setItem(
        "sections_data",
        JSON.stringify(getDataStudents(section, "", "created"))
      );
      toastr.success(`Se ha creado la sección: ${year + section} exitosamente`);
    }
    btn_save.classList.remove("d-none");
  } else {
    toastr.error(`No hay aulas disponibles, aumente el numero de aulas`);
    total_rooms.focus()
  }
}
