let items = document.getElementsByClassName( 'job-title-text' )
for (let index = 0; index < items.length; index++) {
    const item = items[index].children[0];
    item.setAttribute( 'href', 'http://jobs.bdjobs.com/'+item.getAttribute( 'href' ) )
}