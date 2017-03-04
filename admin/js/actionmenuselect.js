ddaccordion.init({
        headerclass: "menuheader",
        contentclass: "menucontent",
        revealtype: "clickgo",
        mouseoverdelay: 200,
        collapseprev: true,
        defaultexpanded: [0],
        onemustopen: false,
//        animatedefault: false,
        persiststate: true,
        toggleclass: ["unselected", "selected"],
//        togglehtml: ["none", "", ""],
//        animatespeed: 500,
        oninit: function(expandedindices) {
        },
        onopenclose: function(header, index, state, isuseractivated) {
        }
    })