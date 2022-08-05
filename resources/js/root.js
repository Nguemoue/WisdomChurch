require("./bootstrap")
import { createApp } from "vue"
import app from "./Pages/App"

const vm = new createApp()

vm.mount("#el")
