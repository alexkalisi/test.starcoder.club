document.addEventListener("DOMContentLoaded", loader);

function loader() {
  document.querySelector("#section_one button").addEventListener("click", () => { load_form(document.documentElement.scrollWidth); }, false);
  ;(async () => {
    const response = await axios.get('/wp-content/themes/omega/load_posts.php');
    document.querySelector("#posts_wrapper").innerHTML = response.data;
    let showMore = document.querySelectorAll('.show_more');
    for (let i = 0; i < showMore.length; i++) {
      showMore[i].addEventListener("click", function() {
        this.parentNode.querySelector(".hidden_selector").classList.toggle('hidden');
        this.classList.toggle('shown');
        let more = this.getAttribute("more");
        let less = this.getAttribute("less");
        if (this.classList.contains('shown')) {
          this.querySelector("span").textContent = less;
        } else {
          this.querySelector("span").textContent = more;
        }
      })
    }
  })()
}

function load_form(scrollWBfr) {
  if ( document.querySelectorAll(".modal_form_wrapper").length === 0 ) {
    let url = window.location.pathname;
    let form_title = window.phpData.form_title
    let name_placeholder = window.phpData.name_placeholder;
    let submit = window.phpData.submit;
    let formW = document.createElement("div");
    formW.classList.add("modal_form_wrapper");
    let form = document.createElement("div");
    form.classList.add("modal_form");
    let btn = document.createElement("button");
    btn.classList.add("modal_form_submit");
    btn.textContent = submit;
    let btncls = document.createElement("button");
    btncls.classList.add("modal_form_close");
    btncls.textContent = "×";
    btncls.addEventListener("click", destroy_form);
    let inner = '<div class="modal_form_header"><span class="modal_form_title">' + form_title + '</span></div><div class="modal_form_body"><input type="text" placeholder="' + name_placeholder + '" id="modal_form_name" /></div>';
    form.innerHTML = inner;
    form.appendChild(btn);
    form.appendChild(btncls);
    formW.appendChild(form);
    document.body.appendChild(formW);
    document.body.style.overflow = "hidden";
    let scrollWAft = document.documentElement.scrollWidth;
    let bodyMar = "0";
    if (scrollWBfr < scrollWAft) {
      let val = scrollWBfr - scrollWAft;
      bodyMar = "0 0 0 " + val + "px";
    }
    document.body.style.margin = bodyMar;
  }
}

function destroy_form() {
  document.querySelector(".modal_form_wrapper").remove();
  document.body.style.overflow = "auto";
  document.body.style.margin="0"
}


