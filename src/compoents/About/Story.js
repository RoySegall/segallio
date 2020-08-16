import React from "react";
import "./Story.scss";
import Pictures from "./Pictures";

export default () => {
    return <section className="text about-me-section">

        <div>
            <h2 className="pb-4 pt-4 title-for-text">About me</h2>

            <div className="text-to-read text-xl m-auto w-3/4 xs:w-11/12 sm:w-11/12 md:w-11/12">
                <p className="pb-4">
                    Ever since I can remember, I have always loved investigating and
                    discovering how things work. I was soon known as the guy everyone
                    turned to whenever an electronic device broke down. I enjoyed
                    separating the broken devices and studying the different electrical
                    components, which I was able to do freely and carelessly without the
                    risk of destroying the already ruined device.
                </p>

                <p className="pb-4">
                    With the knowledge I’ve gained, I moved on up to sit on a chair at a
                    nice desk. I started by helping local forums to support a popular
                    bulletin board system but had quickly decided that I want to create
                    one by myself. In order to do that, however, one needs to know
                    programming - and so, I’ve taught myself using books and tutorials,
                    enabling me to qualify for my first job at <em>Gizra</em>.
                </p>

                <p className="pb-4">
                    In my free time I enjoy contributing to open source projects. I do so
                    by providing non-commercial codes that can help others. The biggest
                    and smallest cause alike, even someone whose goal is to simply create
                    a website about his cat, can then find a code to help them in an open
                    repository at Github or a blog post at <em>Medium</em>.
                </p>

                <p className="pb-4">
                    My accomplishments in my open source career include a few modules for
                    <em>Drupal</em>, used by large organizations like universities and the
                    EU. Other accomplishments, which I am very proud of as I hold them
                    dear to my heart, include a couple of local DrupalCamps I’ve
                    successfully organized as well as working for the NPO:
                    <em>"The public knowledge workshop" (Hasadna)</em>, whose goal is to make
                    government or any other public data more accessible than it currently
                    is and easier to understand without having to go through confusing
                    spreadsheets.
                </p>

                <p className="pb-4">
                    Besided work and programming, I live with my wife, <a href="https://www.instagram.com/noythecatlady/" className="underline"><em>Noy</em></a>
                    &nbsp;and our two cats -
                    &nbsp;<a href="https://www.instagram.com/tomandsamthecats/" className="underline"><em>Tom</em></a>,
                    &nbsp;the female cat, is quite the lady, while
                    &nbsp;<a href="https://www.instagram.com/tomandsamthecats/" className="underline"><em>Sam</em></a>,
                    &nbsp;the male cat, is the adorable troublemaker.
                </p>

                <Pictures />
            </div>

        </div>

    </section>
}
