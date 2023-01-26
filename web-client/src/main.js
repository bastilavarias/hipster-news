import { createApp } from "vue";
import { Quasar } from "quasar";

import "@quasar/extras/roboto-font/roboto-font.css";
import "@quasar/extras/material-icons/material-icons.css";
import "@quasar/extras/material-icons-outlined/material-icons-outlined.css";
import "@quasar/extras/material-icons-round/material-icons-round.css";
import "@quasar/extras/material-icons-sharp/material-icons-sharp.css";
import "quasar/src/css/index.sass";

import App from "./App.vue";

const myApp = createApp(App);

myApp.use(Quasar, {
  plugins: {},
});

myApp.mount("#app");
