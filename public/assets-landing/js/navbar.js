// jumbotron
const jumbotron = document.getElementById('jumbotron-nav');
const jumbotron2 = document.getElementById('jumbotron');
let jumbotronTop = jumbotron2.getBoundingClientRect().top;
jumbotron.addEventListener('click', () => window.scrollTo({
    top: jumbotronTop - 100,
    behavior: 'smooth',
}));


// about
const btn = document.getElementById('about-nav');
const btnFooter = document.getElementById('about-footer');
const btn2 = document.getElementById('about');
let btnTop = btn2.getBoundingClientRect().top;
btn.addEventListener('click', () => window.scrollTo({
    top: btnTop - 100,
    behavior: 'smooth',
}));
btnFooter.addEventListener('click', () => window.scrollTo({
    top: btnTop - 100,
    behavior: 'smooth',
}));


// features
const features = document.getElementById('features-nav');
const featuresFooter = document.getElementById('features-footer');
const features2 = document.getElementById('features');
let featuresTop = features2.getBoundingClientRect().top;
features.addEventListener('click', () => window.scrollTo({
    top: featuresTop - 100,
    behavior: 'smooth',
}));
featuresFooter.addEventListener('click', () => window.scrollTo({
    top: featuresTop - 100,
    behavior: 'smooth',
}));


// pricing
const pricing = document.getElementById('pricing-nav');
const pricingFooter = document.getElementById('pricing-footer');
const pricing2 = document.getElementById('pricing');
let pricingTop = pricing2.getBoundingClientRect().top;
pricing.addEventListener('click', () => window.scrollTo({
    top: pricingTop - 80,
    behavior: 'smooth',
}));
pricingFooter.addEventListener('click', () => window.scrollTo({
    top: pricingTop - 80,
    behavior: 'smooth',
}));


// testimoni
const testimoni = document.getElementById('testimoni-nav');
const testimoniFooter = document.getElementById('testimoni-footer');
const testimoni2 = document.getElementById('testimoni');
let testimoniTop = testimoni2.getBoundingClientRect().top;
testimoni.addEventListener('click', () => window.scrollTo({
    top: testimoniTop - 80,
    behavior: 'smooth',
}));
testimoniFooter.addEventListener('click', () => window.scrollTo({
    top: testimoniTop - 80,
    behavior: 'smooth',
}));

// get window width
let windowWidth = window.innerWidth;
let plus = 200;

// faq
const faq = document.getElementById('faq-nav');
const faqFooter = document.getElementById('faq-footer');
const faq2 = document.getElementById('faq');
if((windowWidth > 1200)){
    plus = 250;
} else if(windowWidth > 992){
    plus = 300;
} else if(windowWidth > 768){
    plus  = 400;
} else if (windowWidth > 600){
    plus = 400;
} else if (windowWidth > 250){
    plus = 450;
} else{
    plus = 700;
}

let faqTop = faq2.getBoundingClientRect().top;
faq.addEventListener('click', () => window.scrollTo({
    top: faqTop + plus,
    behavior: 'smooth',     
}));
faqFooter.addEventListener('click', () => window.scrollTo({
    top: faqTop + plus,
    behavior: 'smooth',     
}));

// whoweare
const whoweare = document.getElementById('whoweare-nav');
const whoweareFooter = document.getElementById('whoweare-footer');
const whoweare2 = document.getElementById('who-we-are');
let whoweareTop = whoweare2.getBoundingClientRect().top;
if((windowWidth > 1200)){
    plus = 250;
} else if(windowWidth > 992){
    plus = 300;
} else if(windowWidth > 768){
    plus  = 400;
} else if (windowWidth > 600){
    plus = 400;
} else if (windowWidth > 250){
    plus = 450;
} else{
    plus = 700;
}
whoweare.addEventListener('click', () => window.scrollTo({
    top: whoweareTop + plus ,
    behavior: 'smooth',
}));
whoweareFooter.addEventListener('click', () => window.scrollTo({
    top: whoweareTop + plus ,
    behavior: 'smooth',
}));

// contact
const contact = document.getElementById('contact-nav');
const contactFooter = document.getElementById('contact-footer');
const contact2 = document.getElementById('contact');
let contactTop = contact2.getBoundingClientRect().top;
if((windowWidth > 1200)){
    plus = 250;
} else if(windowWidth > 992){
    plus = 300;
} else if(windowWidth > 768){
    plus  = 400;
} else if (windowWidth > 600){
    plus = 400;
} else if (windowWidth > 250){
    plus = 450;
} else{
    plus = 700;
}
// contact.addEventListener('click', () => window.scrollTo({
//     top: contactTop + plus,
//     behavior: 'smooth',
// }));

contact.addEventListener('click', contactReload);

contactFooter.addEventListener('click', () => window.scrollTo({
    top: contactTop + plus,
    behavior: 'smooth',
}));

function contactReload(){
    window.scrollTo({
        top: contactTop + plus,
        behavior: 'smooth',
    });
}