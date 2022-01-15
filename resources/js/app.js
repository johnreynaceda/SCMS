require("./bootstrap");

import Alpine from "alpinejs";
import collapse from "@alpinejs/collapse";
import persist from "@alpinejs/persist";

Alpine.plugin(persist);

Alpine.plugin(collapse);

// import * as FilePond from "filepond";
window.Alpine = Alpine;

Alpine.start();
