import styles from './jobs.module.scss';
import {robotoMono} from "@/common/fonts";
export const Jobs = () => <div className={styles.jobsWrapper} id='jobs'>

    <div className={styles.jobs}>
        <h2 className={robotoMono.className}>Jobs</h2>
        <div className={styles.content}>

            <div className={styles.header}>
                <img src="https://segall.io/static/0bb8f82eecaa3b8775b38ac0674e9a31/ee604/dreamed-diabetes.png" className={styles.logo} />
                <h3 className={`${robotoMono.className} ${styles.jobTitle}`}>Dreamed Diabetes, 2019: Developer</h3>
            </div>

            <div className={styles.jobInfo}>
                <p className={robotoMono.className}>
                    2018 was a rough year. I quit my job, and then I found another job which I loved very much. Then, I got fired. Surprisingly, I was looking for a job, again. Took me a couple of months but I found it. It was a, pardon my french, crappy job. It was so bad I rather not talk about it, and delete any reference of me being employed there. After three months I decided to quit and look for another job.
                </p>

                <p className={robotoMono.className}>
                    2018 was a rough year. I quit my job, and then I found another job which I loved very much. Then, I got fired. Surprisingly, I was looking for a job, again. Took me a couple of months but I found it. It was a, pardon my french, crappy job. It was so bad I rather not talk about it, and delete any reference of me being employed there. After three months I decided to quit and look for another job.
                </p>

                <p className={robotoMono.className}>
                    2018 was a rough year. I quit my job, and then I found another job which I loved very much. Then, I got fired. Surprisingly, I was looking for a job, again. Took me a couple of months but I found it. It was a, pardon my french, crappy job. It was so bad I rather not talk about it, and delete any reference of me being employed there. After three months I decided to quit and look for another job.
                </p>

                <p className={robotoMono.className}>
                    2018 was a rough year. I quit my job, and then I found another job which I loved very much. Then, I got fired. Surprisingly, I was looking for a job, again. Took me a couple of months but I found it. It was a, pardon my french, crappy job. It was so bad I rather not talk about it, and delete any reference of me being employed there. After three months I decided to quit and look for another job.
                </p>
            </div>
        </div>
    </div>

</div>
