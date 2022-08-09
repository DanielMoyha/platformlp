// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
    "use strict";

    // Validation Forms Bootstrap
    let forms = document.querySelectorAll(".needs-validation");

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms).forEach(function (form) {
        form.addEventListener(
            "submit",
            function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                form.classList.add("was-validated");
            },
            false
        );
    });
    

    /** START */

    // Toggle, para mostrar y ocultar el sidebar
    document.addEventListener("DOMContentLoaded", function (event) {
        // Toggle the side navigation
        const sidebarToggle = document.body.querySelector("#sidebarToggle");
        if (sidebarToggle) {
            // Uncomment Below to persist sidebar toggle between refreshes
            // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
            //     document.body.classList.toggle('sb-sidenav-toggled');
            // }
            sidebarToggle.addEventListener("click", (event) => {
                event.preventDefault();
                document.body.classList.toggle("sb-sidenav-toggled");
                localStorage.setItem(
                    "sb|sidebar-toggle",
                    document.body.classList.contains("sb-sidenav-toggled")
                );
            });
        }
        //eventListeners();
    });

    /** Casos - Admin */
    const inputsConyugal = document.getElementsByName('conyugal');
    const inputsMaterno = document.getElementsByName('materno');
    const inputsPaterno = document.getElementsByName('paterno');
    const inputsFraterno = document.getElementsByName('fraterno');

    inputsConyugal.forEach((input) => {
        input.addEventListener('input', (e) => {
            let value;

            switch(e.target.type) {
                case 'checkbox':
                    value = e.target.checked;
                    break;
                case 'text':
                    value = e.target.value;
                    break;
            }

            const needDisable = !(value === '' || value === false);

            inputsConyugal.forEach((input) => {
                if (input === e.target) {
                    input.disabled = false;
                    return;
                }
                input.disabled = needDisable;
            });
        });
    });

    inputsMaterno.forEach((input) => {
        input.addEventListener('input', (e) => {
            let value;

            switch(e.target.type) {
                case 'checkbox':
                    value = e.target.checked;
                    break;
                case 'text':
                    value = e.target.value;
                    break;
            }

            const needDisable = !(value === '' || value === false);

            inputsMaterno.forEach((input) => {
                if (input === e.target) {
                    input.disabled = false;
                    return;
                }
                input.disabled = needDisable;
            });
        });
    });

    inputsPaterno.forEach((input) => {
        input.addEventListener('input', (e) => {
            let value;

            switch(e.target.type) {
                case 'checkbox':
                    value = e.target.checked;
                    break;
                case 'text':
                    value = e.target.value;
                    break;
            }

            const needDisable = !(value === '' || value === false);

            inputsPaterno.forEach((input) => {
                if (input === e.target) {
                    input.disabled = false;
                    return;
                }
                input.disabled = needDisable;
            });
        });
    });

    inputsFraterno.forEach((input) => {
        input.addEventListener('input', (e) => {
            let value;

            switch(e.target.type) {
                case 'checkbox':
                    value = e.target.checked;
                    break;
                case 'text':
                    value = e.target.value;
                    break;
            }

            const needDisable = !(value === '' || value === false);

            inputsFraterno.forEach((input) => {
                if (input === e.target) {
                    input.disabled = false;
                    return;
                }
                input.disabled = needDisable;
            });
        });
    });
    /** EndCasos - Admin */

    /** Anamnesis - Psicólogos */
    const inputs_em_enfermedades = document.getElementsByName('em_enfermedades');
    const inputs_pr_lugar_atencion = document.getElementsByName('pr_lugar_atencion');
    const inputs_rn_apgar = document.getElementsByName('rn_apgar');
    const inputs_rn_color = document.getElementsByName('rn_color');
    const inputs_pi_operacion_quirurgica = document.getElementsByName('pi_operacion_quirurgica');
    const inputs_da_enfermedad = document.getElementsByName('da_enfermedad');
    const inputs_da_moja_orina = document.getElementsByName('da_moja_orina');
    const inputs_da_miedo = document.getElementsByName('da_miedo');
    const inputs_da_disciplina = document.getElementsByName('da_disciplina');

    inputs_em_enfermedades.forEach((input) => {
        input.addEventListener('input', (e) => {
            let value;

            switch(e.target.type) {
                case 'checkbox':
                    value = e.target.checked;
                    break;
                case 'text':
                    value = e.target.value;
                    break;
            }

            const needDisable = !(value === '' || value === false);

            inputs_em_enfermedades.forEach((input) => {
                if (input === e.target) {
                    input.disabled = false;
                    return;
                }
                input.disabled = needDisable;
            });
        });
    });

    inputs_pr_lugar_atencion.forEach((input) => {
        input.addEventListener('input', (e) => {
            let value;

            switch(e.target.type) {
                case 'checkbox':
                    value = e.target.checked;
                    break;
                case 'text':
                    value = e.target.value;
                    break;
            }

            const needDisable = !(value === '' || value === false);

            inputs_pr_lugar_atencion.forEach((input) => {
                if (input === e.target) {
                    input.disabled = false;
                    return;
                }
                input.disabled = needDisable;
            });
        });
    });

    inputs_rn_apgar.forEach((input) => {
        input.addEventListener('input', (e) => {
            let value;

            switch(e.target.type) {
                case 'checkbox':
                    value = e.target.checked;
                    break;
                case 'text':
                    value = e.target.value;
                    break;
            }

            const needDisable = !(value === '' || value === false);

            inputs_rn_apgar.forEach((input) => {
                if (input === e.target) {
                    input.disabled = false;
                    return;
                }
                input.disabled = needDisable;
            });
        });
    });

    inputs_rn_color.forEach((input) => {
        input.addEventListener('input', (e) => {
            let value;

            switch(e.target.type) {
                case 'checkbox':
                    value = e.target.checked;
                    break;
                case 'text':
                    value = e.target.value;
                    break;
            }

            const needDisable = !(value === '' || value === false);

            inputs_rn_color.forEach((input) => {
                if (input === e.target) {
                    input.disabled = false;
                    return;
                }
                input.disabled = needDisable;
            });
        });
    });

    inputs_pi_operacion_quirurgica.forEach((input) => {
        input.addEventListener('input', (e) => {
            let value;

            switch(e.target.type) {
                case 'checkbox':
                    value = e.target.checked;
                    break;
                case 'text':
                    value = e.target.value;
                    break;
            }

            const needDisable = !(value === '' || value === false);

            inputs_pi_operacion_quirurgica.forEach((input) => {
                if (input === e.target) {
                    input.disabled = false;
                    return;
                }
                input.disabled = needDisable;
            });
        });
    });

    inputs_da_enfermedad.forEach((input) => {
        input.addEventListener('input', (e) => {
            let value;

            switch(e.target.type) {
                case 'checkbox':
                    value = e.target.checked;
                    break;
                case 'text':
                    value = e.target.value;
                    break;
            }

            const needDisable = !(value === '' || value === false);

            inputs_da_enfermedad.forEach((input) => {
                if (input === e.target) {
                    input.disabled = false;
                    return;
                }
                input.disabled = needDisable;
            });
        });
    });

    inputs_da_moja_orina.forEach((input) => {
        input.addEventListener('input', (e) => {
            let value;

            switch(e.target.type) {
                case 'checkbox':
                    value = e.target.checked;
                    break;
                case 'text':
                    value = e.target.value;
                    break;
            }

            const needDisable = !(value === '' || value === false);

            inputs_da_moja_orina.forEach((input) => {
                if (input === e.target) {
                    input.disabled = false;
                    return;
                }
                input.disabled = needDisable;
            });
        });
    });

    inputs_da_miedo.forEach((input) => {
        input.addEventListener('input', (e) => {
            let value;

            switch(e.target.type) {
                case 'checkbox':
                    value = e.target.checked;
                    break;
                case 'text':
                    value = e.target.value;
                    break;
            }

            const needDisable = !(value === '' || value === false);

            inputs_da_miedo.forEach((input) => {
                if (input === e.target) {
                    input.disabled = false;
                    return;
                }
                input.disabled = needDisable;
            });
        });
    });

    inputs_da_disciplina.forEach((input) => {
        input.addEventListener('input', (e) => {
            let value;

            switch(e.target.type) {
                case 'checkbox':
                    value = e.target.checked;
                    break;
                case 'text':
                    value = e.target.value;
                    break;
            }

            const needDisable = !(value === '' || value === false);

            inputs_da_disciplina.forEach((input) => {
                if (input === e.target) {
                    input.disabled = false;
                    return;
                }
                input.disabled = needDisable;
            });
        });
    });

    /** End - Psicólogos */

    /* function eventListeners() {
        // Muestra campos condicionales
        const metodoMostrarInputText_conyugal = document.querySelectorAll(
            'input[name="conyugal"]'
        );
        const metodoMostrarInputText_materno = document.querySelectorAll(
            'input[name="materno"]'
        );
        const metodoMostrarInputText_paterno = document.querySelectorAll(
            'input[name="paterno"]'
        );
        const metodoMostrarInputText_fraterno = document.querySelectorAll(
            'input[name="fraterno"]'
        );
        // console.log(metodoMostrarInputText_conyugal[0].name);
        // para iterar cuando sea más de 1, y añadir ese addEventListener
        metodoMostrarInputText_conyugal.forEach((input) =>
            input.addEventListener("click", mostrarInputText_RelacionesFamiliares)
        );

        metodoMostrarInputText_materno.forEach((input) =>
            input.addEventListener("click", mostrarInputText_RelacionesFamiliares)
        );

        metodoMostrarInputText_paterno.forEach((input) =>
            input.addEventListener("click", mostrarInputText_RelacionesFamiliares)
        );

        metodoMostrarInputText_fraterno.forEach((input) =>
            input.addEventListener("click", mostrarInputText_RelacionesFamiliares)
        );
    } */

    /* function mostrarInputText_RelacionesFamiliares(e) {
        //Para mostrar el cuadro de texto en caso de que necesite describir otro - Relacione Familiares
        const inputOtro_conyugal = document.querySelector("#input-otro-conyugal");
        const inputOtro_materno = document.querySelector("#input-otro-materno");
        const inputOtro_paterno = document.querySelector("#input-otro-paterno");
        const inputOtro_fraterno = document.querySelector("#input-otro-fraterno");

        if (e.target.value === "otros-conyugal") {
            inputOtro_conyugal.innerHTML = `
                <input type="text" class="form-control" id="otros-conyugal" name="conyugal" placeholder="Describa..." required>
                `;
        } else {
            if (e.target.name === "conyugal") {
                inputOtro_conyugal.innerHTML = "";
            }
        }

        if (e.target.value === "otros-materno") {
            inputOtro_materno.innerHTML = `
                <input type="text" class="form-control" id="otros-materno" name="materno" placeholder="Describa..." required>
                `;
        } else {
            if (e.target.name === "materno") {
                inputOtro_materno.innerHTML = "";
            }
        }

        if (e.target.value === "otros-paterno") {
            inputOtro_paterno.innerHTML = `
                <input type="text" class="form-control" id="otros-paterno" name="paterno" placeholder="Describa..." required>
                `;
        } else {
            if (e.target.name === "paterno") {
                inputOtro_paterno.innerHTML = "";
            }
        }

        if (e.target.value === "otros-fraterno") {
            inputOtro_fraterno.innerHTML = `
                <input type="text" class="form-control" id="otros-fraterno" name="fraterno" placeholder="Describa..." required>
                `;
        } else {
            if (e.target.name === "fraterno") {
                inputOtro_fraterno.innerHTML = "";
            }
        }
        // console.log(e.target.name + ' => ' + e.target.value);
    } */
    /** END */
})();