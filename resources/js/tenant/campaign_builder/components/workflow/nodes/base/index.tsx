export default function BaseNode({selected, children, title, description}) {
    return (
        <div style={{minWidth: '150px'}}
             className={(selected ? 'border-primary' : 'border-white') + ' card border border-3'}>
            <div className="card-header">
                <h3 className="card-title mb-0">{title}</h3>
            </div>
            <div className="card-body">
                {children}
            </div>

            {
                description &&
                <div className="card-footer">{description}</div>
            }
        </div>
    );
}
