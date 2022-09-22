/**
 * actulus selectbox
 */


const selectBox = {
    init: function (selectBox) {
        // js random key generator
        function randomKey() {
            return Math.random().toString(36).substr(2, 9);
        }
        if (selectBox.getAttribute('data-id') === null) {
            this.createSelectBox(selectBox, randomKey());
        } else {
            this.createSelectBox(selectBox, selectBox.getAttribute('data-id'));
        }
    },
    /** 
     * first of all, find all select boxes
    */
    /**
     * create custom select box
     */
    createSelectBox: function (selectBox, key) {
        // hide selectBox
        selectBox.style.display = "none";

        // get data-id attribute
        const last_id = selectBox.getAttribute("data-id");

        if (document.querySelector('.select-container[data-key="' + last_id + '"]')) {
            document.querySelector('.select-container[data-key="' + last_id + '"]').remove();
        }

        selectBox.setAttribute('data-id', key);

        const selectContainer = document.createElement("div");
        selectContainer.classList.add("select-container");
        selectContainer.setAttribute('data-key', key)
        selectBox.parentNode.insertBefore(selectContainer, selectBox);

        const selectButton = document.createElement("button");
        selectButton.classList.add("select-button");
        selectButton.type = "button";
        selectContainer.appendChild(selectButton);

        const selectedText = document.createElement("span");
        selectedText.classList.add("selected-text");
        selectButton.appendChild(selectedText);
        selectedText.innerHTML = (selectBox.options[selectBox.selectedIndex]) ? selectBox.options[selectBox.selectedIndex].text : "&nbsp;";

        const selectArrow = document.createElement("span");
        selectArrow.classList.add("select-arrow");
        selectArrow.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 13.172l4.95-4.95 1.414 1.414L12 16 5.636 9.636 7.05 8.222z" fill="rgba(198,198,198,1)"/></svg>'
        selectButton.appendChild(selectArrow);

        const selectOptionsWrapper = document.createElement("div");
        selectOptionsWrapper.classList.add("select-options-wrapper");
        selectContainer.appendChild(selectOptionsWrapper);

        if (selectBox.hasAttribute("data-search")) {
            const searchContainer = document.createElement("div");
            searchContainer.classList.add("search-container");
            selectOptionsWrapper.appendChild(searchContainer);

            const searchInput = document.createElement("input");
            searchInput.classList.add("search-input");
            searchInput.type = "text";
            searchInput.placeholder = "Search...";
            searchContainer.appendChild(searchInput);
            this.search(selectBox, selectContainer, key, searchInput, selectOptionsWrapper);
        }

        const selectOptions = document.createElement("div");
        selectOptions.classList.add("select-options");
        selectOptionsWrapper.appendChild(selectOptions);

        // prepare content
        this.prepareContent(selectBox, selectContainer, selectOptions);

        selectBox.addEventListener('DOMSubtreeModified', () => {
            setTimeout(() => {
                if (!selectContainer.classList.contains('acting')) {
                    this.prepareContent(selectBox, selectContainer, selectOptions);
                }
            }, 100);
        });

        // addEventListeners
        this.addEventListeners(selectBox, selectContainer, selectOptions, key);
        // search
    },
    prepareContent: function (selectBox, selectContainer, selectOptions,) {
        const selectedText = selectContainer.querySelector('.selected-text');
        const options = selectBox.querySelectorAll("option");
        selectOptions.innerHTML = '';
        let i = 0;
        options.forEach((option) => {
            option.setAttribute("data-index", i);
            const optionElement = document.createElement("button");
            optionElement.classList.add("select-option");
            optionElement.type = "button";
            optionElement.innerHTML = option.text;
            optionElement.setAttribute("data-value", option.value);
            optionElement.setAttribute("data-index", i);
            selectedText.innerHTML = (selectBox.options[selectBox.selectedIndex]) ? selectBox.options[selectBox.selectedIndex].text : "&nbsp;";
            if (option.selected) optionElement.classList.add("active");
            selectOptions.appendChild(optionElement);

            optionElement.addEventListener("click", (e) => {
                selectContainer.classList.add('acting');
                selectedText.innerHTML = e.target.innerHTML;
                selectBox.value = e.target.getAttribute("data-value");
                // add active class to selected option
                const options = selectContainer.querySelectorAll(".select-option");
                options.forEach((option) => {
                    option.classList.remove("active");
                });
                e.target.classList.add("active");
                // fix for same value's option
                // remove selectbox selected attribute
                if (selectBox.querySelector('[selected]')) selectBox.querySelector('[selected]').removeAttribute('selected');
                selectBox.querySelector("option[data-index='" + e.target.getAttribute("data-index") + "']").setAttribute("selected", "selected");
                selectBox.selectedIndex = e.target.getAttribute("data-index");
                var event = document.createEvent('HTMLEvents');
                event.initEvent('change', true, false);
                selectBox.dispatchEvent(event);
                this.switchBox(selectContainer, 'close');
                setTimeout(() => {
                    selectContainer.classList.remove('acting');
                }, 100);
            });

            i++;
        });

    },
    /**
     * add event listeners to select options
     * @param {HTMLElement} selectBox
     * @param {HTMLElement} selectOptions
     **/
    addEventListeners: function (selectBox, selectContainer, selectOptions, key) {
        const selectButton = selectContainer.querySelector(".select-button");

        selectButton.addEventListener("click", (e) => {
            if (selectContainer.classList.contains("open")) {
                this.switchBox(selectContainer, 'close');
            } else {
                this.switchBox(selectContainer, 'open');
            }
        });

        document.addEventListener("click", (e) => {
            if (!e.target.closest(".select-container[data-key='" + key + "']")) {
                this.switchBox(selectContainer, 'close');
            }
        });
    },
    search: function (selectBox, selectContainer, key, searchInput, selectOptionsWrapper) {
        const selectOptions = selectContainer.querySelector(".select-options");
        searchInput.addEventListener("keyup", (e) => {
            const filter = searchInput.value.toUpperCase();
            const options = selectContainer.querySelectorAll(".select-option");
            let i = 0;
            for (i = 0; i < options.length; i++) {
                let option = options[i];
                let txtValue = option.textContent || option.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    option.style.display = "";
                } else {
                    option.style.display = "none";
                }
            }
        });
    },
    switchBox: function (selectContainer, type) {
        const optionsWrapper = selectContainer.querySelector(".select-options-wrapper");
        if (type === "open") {
            optionsWrapper.style.transform = "translateY(-10px)";
            optionsWrapper.style.opacity = "0";
            optionsWrapper.style.transition = "all .14s ease-in-out";
            selectContainer.classList.add("open");
            let optHeight = optionsWrapper.querySelector('.select-options').offsetHeight;
            let top = selectContainer.offsetTop;
            let height = selectContainer.offsetHeight;
            let windowHeight = window.innerHeight;
            let scrollTop = window.scrollY;
            let elementPos = top - scrollTop + height;
            if (elementPos > windowHeight - optHeight
                && top - scrollTop < windowHeight - optHeight + top - scrollTop
                && top > optHeight) {
                optionsWrapper.style.bottom = `${height + 10}px`;
                optionsWrapper.style.top = 'initial';
            }
            setTimeout(() => {
                optionsWrapper.style.transform = "translateY(0)";
                optionsWrapper.style.opacity = "1";
            }, 1);
        } else if (type === "close") {
            setTimeout(() => {
                optionsWrapper.style.transform = "translateY(-10px)";
                optionsWrapper.style.opacity = "0";
            }, 1);
            setTimeout(() => {
                optionsWrapper.style = '';
                selectContainer.classList.remove("open");
            }, 142);
        }
    }
};

const selectBoxes = document.querySelectorAll("select");
selectBoxes.forEach((sb) => {
    setTimeout(() => {
        selectBox.init(sb);
    }, 100);
});