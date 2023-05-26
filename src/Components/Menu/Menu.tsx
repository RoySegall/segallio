import styles from './Menu.module.scss';

export const Menu = () => <div className={styles.menu}>
    <div className={styles.innerMenu}>
        <a>Home</a>

        <ul>
            <li>Jobs</li>
            <li>Blog posts</li>
        </ul>
    </div>
</div>
