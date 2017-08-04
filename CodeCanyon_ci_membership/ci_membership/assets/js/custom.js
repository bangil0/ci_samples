function brandmpn_pair_Check(that) {
    if (that.value == "MPN") {
        alert("checked");
        document.getElementById("brandmpn_pair").style.display = "block";
    } else {
        document.getElementById("brandmpn_pair").style.display = "none";
    }
}