document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll("[data-tabs]").forEach(function (tabsBlock) {
    const tabs = tabsBlock.querySelectorAll(".c-tabs__nav-item");
    const panels = tabsBlock.querySelectorAll(".c-tabs__panel");

    tabs.forEach(function (tab) {
      tab.addEventListener("click", function () {
        const target = tab.getAttribute("data-tab");

        tabs.forEach((t) => t.classList.remove("is-active"));
        panels.forEach((p) => p.classList.remove("is-active"));

        tab.classList.add("is-active");
        tabsBlock
          .querySelector(`[data-tabpanel="${target}"]`)
          .classList.add("is-active");
      });
    });
  });
});
