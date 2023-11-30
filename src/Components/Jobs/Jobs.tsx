'use client';

import ReactChild, {FC, useEffect, useMemo, useRef, useState} from "react";
import styles from './jobs.module.scss';
import {robotoMono} from "@/common/fonts";
import Image from 'next/image';
import {jobs as jobEntries} from './data';

const Job: FC<{ image: string, name: string, paragraphs: ReactChild.JSX.Element[]}> = ({name, image, paragraphs}) => {
    const paragraphsRef = useRef<HTMLDivElement>(null);

    useEffect(() => {
        if (paragraphsRef.current) {
            paragraphsRef.current.scroll(0, 0)
        }
    }, [name]);

    return <div className={styles.job} >
        <Image src={image} height={70} alt={name}/>

        <div className={styles.paragraphs} ref={paragraphsRef}>
            {paragraphs.map((paragraph, index) => <p key={index}>{paragraph}</p>)}
        </div>
    </div>;
}

export const Jobs = () => {
    const jobs = [
        jobEntries.gizra,
        jobEntries.realCommerce,
        jobEntries.taliaz,
        jobEntries.dreamed,
        jobEntries.testim,
    ];
    const [jobId, setJobId] = useState(jobEntries.gizra.id);
    const selectedJob = useMemo(() => jobs.find(job => job.id === jobId) || jobEntries.testim, [jobs, jobId]);
    return <div className={`${styles.jobsWrapper} ${robotoMono.className}`} id='jobs'>
        <h2>Jobs</h2>

        <div className={styles.timelineJobWrapper}>
            <div className={styles.timeline}>
                <div className={styles.box}>
                    <div className={styles.container}>
                        <div className={styles.cards}>
                            {jobs.map((job, index) => <div className={styles.card} key={index}
                                                           onClick={() => setJobId(job.id)}>
                                    <div className={`${styles.dot} ${job.id === jobId && styles.active}`}></div>
                                    <h4>{job.name}</h4>
                                    <p>{job.position}, {job.period.start} {job.period.end && `- ${job.period.end}`}</p>
                                </div>
                            )}
                        </div>
                    </div>
                </div>
            </div>
            <Job name={selectedJob.name} image={selectedJob.image} paragraphs={selectedJob.paragraphs} />
        </div>

    </div>
}
