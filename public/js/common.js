/* Alert delete worker */
function ConfirmWorkerDelete()
{
	var x = confirm("Вы действительно хотите удалить сотрудника?");
	if (x){
		return true;
	} else {
		return false;
	}
}

/* Alert delete division */
function ConfirmDivisionDelete(countWorkers)
{
	var countWorkers = countWorkers;
	if (countWorkers > 0) {
		alert("Нельзя удалить отдел в котором есть сотрудники!");
		return false;
	} else {
		var x = confirm("Вы действительно хотите удалить отдел?");
		if (x){
			return true;
		} else {
			return false;
		}
	}
}

/* Nav tabs */
function navTabs()
{ 
	var firstWord = '/'+location.pathname.split('/')[1];
	$('nav a[href="'+firstWord+'"]').parent().addClass('active');
}
navTabs();