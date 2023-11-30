/* eslint-disable react/no-unescaped-entities */
import {Job} from "@/Components/Jobs/data/Job";
import image from './pictures/tricentis.png'

export const testim: Job = {
    id: 'testim',
    image: image,
    name: 'Testim / Tricetis IL',
    period: {
        start: '2021'
    },
    position: 'Developer',
    paragraphs: [
        <>
            Yes, <em>Dreamed diabetes</em> did a lot of important stuff but I was missing something I had in <em>gizra</em> -
            contributing code, blog posts, meetup. As <em>Dreamed Diabetes</em> goal did not align with what I was looking
            I decided to look for another job. Besides that, <em>Python</em> was not that amazing language. Sure, every
            language have it's own magic but I could much more from <em>PHP</em>.
        </>,

        <>
            As I was looking for a job for some while I thought I could not find what I was looking for - a product
            company with an active blog so I could write about what I was doing, talking on meetups. Yes, in Israel there
            are about 5-10 companies that doing it but I hoped something will come up.
        </>,

        <>
            Then, it happens. A recruiter suggested that I will send my CV to <em>testim</em>. As I progresses in the
            interviews it looked like a good place to work at. The idea behind testim is to help people write E2E tests
            without the need to write code. Yet alone, the work in <em>Dremeaed Diabetes</em> I found out the world of QA
            is pretty hard yet alone trying to work with Selenium or cypress turns out pretty hard. In retrospect,
            <em>testim</em> was a good place to work at which I could give my knowledge back.
        </>,

        <>
            Just like any new place learning new tech was amazing (and hard). I learned <em>Typescript</em>, <em>mobx</em>,
            <em>MongoDB</em>, <em>Express</em> and more. The amount of sophistication that made <em>testim</em> work was
            beyond 11. I was able to learn better on how automation works, tools and that <em>mobx</em> is far better state
            management than <em>redux</em> (you can try to convinced me 😄).
        </>,

        <>
            After a year <em>testim</em> was acquired by <em>Tricentis</em> - a leading company with amazing products in
            the QA world. Yes, moving to outlook was pretty sad but an amazing opportunity was around the corner;
            Starting to work on a new product called <em>Testim Mobile</em>.
        </>,
        <>
            You probably asking your self why. In <em>Dreamed Diabetes</em> I found out that doing automation for mobile
            application is hard. Very hard. Now, starting to work on a new product where I can bring to the table all the
            stuff that I know people would struggle with was a dream come true.
        </>,
        <>
            As the work on <em>testim</em> mobile progressed it looked like we made the correct choices and got to bring
            to the world a product that designed by a developer who knows the struggle of mobile automation. As always,
            what the future hold it's mystery but for now it's is looking amazing.
        </>
    ],
}
