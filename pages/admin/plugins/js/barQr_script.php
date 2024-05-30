<script>
    $(document).ready(function() {

        let btn = document.querySelector(".button");
        let qr_code_element = document.querySelector(".qr-code");

        btn.addEventListener("click", () => {
            let user_input = document.querySelector("#input_text");
            if (user_input.value != "") {
                if (qr_code_element.childElementCount == 0) {
                    generate(user_input);
                } else {
                    qr_code_element.innerHTML = "";
                    generate(user_input);
                }
            } else {
                console.log("not valid input");
                qr_code_element.style = "display: none";
            }
        });

        function generate(user_input) {
            qr_code_element.style = "";

            let qrcode = new QRCode(qr_code_element, {
                text: `${user_input.value}`,
                width: 180, //128
                height: 180,
                colorDark: "#000000",
                colorLight: "#ffffff",
                correctLevel: QRCode.CorrectLevel.H
            });

            let download = document.createElement("button");
            qr_code_element.appendChild(download);

            let download_link = document.createElement("a");
            download_link.setAttribute("download", "qr_code.png");
            download_link.innerHTML = `Download`;

            download.appendChild(download_link);

            let qr_code_img = document.querySelector(".qr-code img");
            let qr_code_canvas = document.querySelector("canvas");

            if (qr_code_img.getAttribute("src") == null) {
                setTimeout(() => {
                    download_link.setAttribute("href", `${qr_code_canvas.toDataURL()}`);
                }, 300);
            } else {
                setTimeout(() => {
                    download_link.setAttribute("href", `${qr_code_img.getAttribute("src")}`);
                }, 300);
            }
        }

        generate({
            value: "https://codepen.io/coding_dev_"
        });

        document.getElementById("btn").addEventListener("click", () => {
        let text = document.getElementById("text").value;
        JsBarcode("#barcode", text, { format: "CODE128" });

        // Convert the SVG into a data URL representing a PNG image
        let svgElement = document.getElementById("barcode");
        let svgString = new XMLSerializer().serializeToString(svgElement);
        let DOMURL = window.URL || window.webkitURL || window;
        let svgBlob = new Blob([svgString], { type: "image/svg+xml;charset=utf-8" });
        let url = DOMURL.createObjectURL(svgBlob);

        // Create an image element to render the SVG
        let img = new Image();
        img.onload = function () {
            // Create a canvas and draw the image on it
            let canvas = document.createElement("canvas");
            canvas.width = img.width;
            canvas.height = img.height;
            let ctx = canvas.getContext("2d");
            ctx.drawImage(img, 0, 0);

            // Convert the canvas to a data URL representing a PNG image
            let dataURL = canvas.toDataURL("image/png");

            // Set the download link href to the data URL
            let downloadLink = document.getElementById("downloadLink");
            downloadLink.href = dataURL;

            // Make the download link visible
            downloadLink.style.display = "block";

            // Revoke the object URL to free memory
            DOMURL.revokeObjectURL(url);
        };
        img.src = url;
    });
    });
</script>