/* eslint-disable react/no-unescaped-entities */
import {Job} from "@/Components/Jobs/data/Job";
import image from './pictures/taliaz.png'

export const taliaz: Job = {
    id: 'taliaz',
    image: image,
    name: 'Taliaz',
    period: {
        start: '2018',
    },
    position: 'Develper',
    paragraphs: [

        <>
            Sure, I might not have hopped around various companies over the years—I dedicated a solid 7 years to
            <em>gizra</em>. While some might see that as staying put for too long, I view it as loyalty, a feather in my
            cap. Unfortunately, many companies felt my experience wasn't the right fit and swiftly moved on to the next
            candidate.
        </>,

        <>
            <em>Taliaz</em>, however, is a different tale. Frustrated with job hunting, a friend mentioned a potential
            opportunity for a full-stack developer. I took the chance. The process was swift, and this company felt
            unlike any other I'd encountered. A small startup with grand aspirations—to grow and expand beyond its humble
            beginnings by hiring new talent.
        </>,

        <>
            It was precisely what I'd been seeking—a role where my contributions mattered. No longer just another
            project where your efforts vanish into thin air after a couple of years. It's akin to bidding adieu to one
            of your own creations.
        </>,

        <>
            At <em>Taliaz</em>, I had the privilege of spearheading a product rewrite. I chose the backend
            (Symfony in my case) while deferring the frontend decision for later. Initially seeking approval for every
            move, my CTO flipped the script—just build it, and if it doesn't fit, we'll adjust. Suddenly, the gears
            shifted. From waiting for the green light, I had to act swiftly. Mistakes were alright—we'd fix them and
            learn for the next time.
        </>,

        <>
            But alas, good things sometimes end sooner than expected. Just as I was settling in after two months,
            I received the dreaded news—I was let go. The reason? A lack of funding—the anticipated funds hadn't arrived.
        </>,

        <>
            P.S. - I forgot to mention <em>Taliaz</em>'s purpose: they've devised an incredible solution—helping
            individuals with depression find the best-suited medication with minimal side effects. That mission
            resonated with me—I thrive on making a positive impact for others.
        </>
    ],
}
