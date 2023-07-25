import { Offcanvas, Modal } from "bootstrap";
import { Fancybox } from "@fancyapps/ui";
import "@fancyapps/ui/dist/fancybox/fancybox.css";

Fancybox.bind('[data-fancybox="gallery"]', {
  hideScrollbar: true,
  Thumbs: false,
  Toolbar: {
    display: {
      right: ["close"],
    },
  },
});
