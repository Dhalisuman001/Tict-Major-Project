const container = document.getElementById("device__details");
console.log(container);
const widget = document.createElement("div");

widget.setAttribute("class", "col-md-3 col-sm-6 col-12");

widget.innerHTML = `<div class="info-box bg-info">
              <span class="info-box-icon"><i class="far fa-bookmark"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Bookmarks</span>
                <span class="info-box-number">41,410</span>

                <div class="progress">
                  <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description">
                  70% Increase in 30 Days
                </span>
              </div>

            </div>`;
container.appendChild(widget);
