/* eslint-disable react/no-unescaped-entities */
import {Job} from "@/Components/Jobs/data/Job";
import image from './pictures/dreamed-diabetes.png'

export const dreamed: Job = {
    id: 'dreamed',
    image: image,
    name: 'Dreamed Diabetes',
    period: {
        end: '2021',
        start: '2018'
    },
    position: 'Full Stack Developer',
    paragraphs: [
        <>
            Ah, 2018—a rollercoaster of a year. I made a leap from one job to another, finding myself in a role I adored.
            But life threw a curveball, and I unexpectedly found myself job hunting again. It took a while, but I landed
            a gig—a terrible one, to put it mildly. It was so awful that I'd rather wipe any mention of it from existence.
            Three months in, I knew I had to escape and start anew.
        </>,
        <>
            This time around, I had a clear picture of what I sought. The search was tough—each opportunity didn't quite
            match my skills or desires. Then, like a beacon of hope breaking through stormy clouds, I stumbled upon it—my
            current haven—at <em>Dreamed Diabetes</em>.
        </>,
        <>
            Similar to my past stint at <em>Taliaz</em>, <em>Dreamed Diabetes</em> revolves around something profound:
            making a difference in the lives of people with <em>Diabetes</em>. It's about gathering their data, running
            it through ingenious algorithms, and crafting treatment plans that can genuinely change, even save, lives.
            Not something everyone can claim in their job description.
        </>,
        <>
            Working at <em>Dreamed Diabetes</em> introduced me to technologies I could only dream of at the time:
            <em>Python</em> and <em>React</em>, which had me over the moon. But it's not just about the tech—it's a
            revelation. Witnessing how individuals navigate life with diabetes, realizing there's more to managing it
            than just insulin injections—mind-blowing. It's a world you don't learn about in school, and that's a
            disservice.
        </>,
        <>
            Let's shift gears from the technical—it's the people here that shine. I haven't encountered such a pool of
            brilliant minds in one place for a long time (well, they need to be for such a noble cause). Beyond their
            intellect, they're warm, genuine souls with their feet firmly planted. I believe I've found a place that's
            etched into my heart forever.
        </>
    ],
}
