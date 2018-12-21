let quotes = [
	{
		quote: "I have known Tim O'Brien for 15 plus years where he has contributed to a significant number of my employees business networking and branding education. He has made a measurable difference in their personal lives while also providing tangible metrics to our business outcomes. Aside from my business relationship with Tim, I consider him a good personal friend and would highly recommend his services.",
		author: "Robert Brunswick",
		position: "Chief Executive Officer",
		img: ""
	},
	{
		quote: "Tim’s instincts and judgement are second to none. He is absolutely one of my go to guys when I have to make a tough or important decision.",
		author: "Pierre Bergougnan",
		position: "CEO Marque Medical",
		img: ""
	},
	{
		quote: "Tim has been a fantastic partner to our brokers; he's helped our team with business development, establishing brand identity, fine-tuning presentation skills and being a trusted partner.",
		author: "Charlie Smith",
		position: "COO JLL",
		img: ""
	},
	{
		quote: "Tim rocks! Plain and simple.",
		author: "Sallie Giblin",
		position: "President, Lockton Insurance",
		img: ""
	},
	{
		quote: "Tim is the Ultimate Trainer/Success Coach/ Mentor/ Friend. I cannot recommend him enough. Since I have been dealing with Tim my business has grown 15X.",
		author: "Wes Sierk",
		position: "President, Risk Management Advisors",
		img: ""
	},
	{
		quote: "When it comes to developing our talent, Tim is one of my key guys I turn to.",
		author: "Oscar Gonzalez",
		position: "President, Northgate Supermarkets",
		img: ""
	},
	{
		quote: "I attended Tim’s Rainmaker U. program for three years. It was such a great experience I have had Tim work with dozens of other brokers in my firm.",
		author: "Davis Moore",
		position: "CEO, Worldwide Facilities",
		img: ""
	},
	{
		quote: "I was in Tim coaching program for a few years and it was a game changer. He has a great ability to see the big picture and zero in on areas where you may need improvement. He is direct, no nonsense and gives you excellent direct feedback.",
		author: "Anthony Marguleas",
		position: "Owner, Amalfi Estates",
		img: ""
	},
	{
		quote: "To this day, I credit Tim with helping guide me in my growth to Senior Executive of a Fortune 300 Company. With his help and guidance, I made it through my lay-off from Citi during the Great Recession to rise through 5 positions at Ameriprise to run 1/6th of almost 8,000 independent Advisor business at Ameriprise Financial.",
		author: "Scott Hirsh",
		position: "Regional VP, Ameriprise Financial Services, Inc.",
		img: ""
	},
]


let $quoteWrap = $(".quote-block"),
$quote = $(".quote-block .quote"),
$quoteAuthor = $(".quote-block .quote-author"),
$quoteAuthorPosition =  $(".quote-block .quote-author-position"),
$quoteImg = $(".quote-block .quote-img"),
quoteCounter = 1;

function setNewQuote(quoteInfo) {
	$quote.html(quoteInfo.quote);
	$quoteAuthor.html(`- ${quoteInfo.author}, <span class="quote-author-position">${quoteInfo.position}</span>`);
	$quoteImg.attr('src', quoteInfo.img);
}

function cycleQuote() {
	console.log('cycle quote');
	let i = quoteCounter;
	let quoteInfo = {
		quote: quotes[i].quote,
		author: quotes[i].author,
		position: quotes[i].position,
		img: quotes[i].img
	}
	console.log(quoteInfo);
	console.log($quoteWrap);
	$quoteWrap.fadeOut(300, function() {
		setNewQuote(quoteInfo);
		$(this).fadeIn(300);
	});

	quoteCounter++;
	if (quoteCounter == quotes.length) quoteCounter = 0;
}
setInterval(cycleQuote, 15000);