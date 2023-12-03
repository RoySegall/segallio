'use client';

import styles from './BlogPosts.module.scss';
import {robotoMono} from "@/common/fonts";
import {BlogPost, blogs} from "@/Components/BlogPosts/Blogs";
import {FontAwesomeIcon} from '@fortawesome/react-fontawesome'
import {faQuoteLeft, faQuoteRight} from '@fortawesome/free-solid-svg-icons';
import type {FC} from "react";
import {useEffect, useRef} from "react";

const BlogPost: FC<BlogPost> = ({url, source,title, paragraph, date}) => <div className={styles.blog}>
        <div className={styles.first}>
            <FontAwesomeIcon icon={faQuoteLeft} className={`${styles.quote}`} />
        </div>

        <div className={styles.second}>
            <div className={styles.top}>
                <span className={`${styles.title} ${robotoMono.className}`}><a href={url} target={'_blank'}>{title}</a></span>
            </div>
            <div className={styles.paragraphWrapper}>
                <p>{paragraph}</p>
            </div>
            <div className={styles.metadata}>
                <span className={styles.source}>{source}, </span>
                <span className={styles.date}>{date}</span>
            </div>
        </div>

        <div className={styles.third}>
            <FontAwesomeIcon icon={faQuoteRight} className={`${styles.quote} ${styles.right}`} />
        </div>
</div>

export const BlogPosts = () => {
    const blogsScrollerRef = useRef<HTMLDivElement>(null);

    useEffect(() => {
        const element = blogsScrollerRef.current;

        if (!element) {
            return;
        }

        const childElements = Array.from(element.querySelectorAll(`.${styles.blog}`)); // all children

        const totalScrollWidth = element.clientWidth;
        const increment = totalScrollWidth / childElements.length;

        let currentScrollPosition = 0;

        // Interval to continually scroll
        const scrollInterval = setInterval(() => {
            currentScrollPosition += increment;

            if (currentScrollPosition < totalScrollWidth) {
                element.scrollTo({
                    left: currentScrollPosition,
                    behavior: "smooth"
                });
            } else {
                currentScrollPosition = 0;
                element.scrollTo({
                    left: currentScrollPosition,
                    behavior: "smooth"
                });
            }
        }, 2000); // Change time as needed

        return () => {
            // Cleanup for the interval when component is unmounted
            clearInterval(scrollInterval);
        };
    }, []);

    return <div className={styles.blogsPostsWrapper}>
        <div className={`${styles.blogs} ${robotoMono.className}`} id="blogs">
            <h2>Blog posts</h2>

            <div className={styles.blogsScroller} ref={blogsScrollerRef}>
                <div className={styles.blogsWrapper}>
                    {blogs.map((blog, index) => <BlogPost key={index} {...blog} />)}
                </div>
            </div>
        </div>
    </div>
}
