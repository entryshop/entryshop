import {Background, Controls, ReactFlow} from '@xyflow/react';
import '@xyflow/react/dist/style.css';
import {useShallow} from 'zustand/react/shallow';
import useStore from './workflow/store';
import './builder.css';

const selector = (state) => ({
    nodes: state.nodes,
    edges: state.edges,
    onNodesChange: state.onNodesChange,
    onEdgesChange: state.onEdgesChange,
    nodeTypes: state.nodeTypes,
    onConnect: state.onConnect,
});


export default () => {
    const {nodes, edges, nodeTypes, onNodesChange, onEdgesChange, onConnect} = useStore(
        useShallow(selector),
    );

    return (
        <div className='border'
             style={{width: '100%', minWidth: '500px', minHeight: '500px', height: 'calc(100vh - 220px)'}}>
            <ReactFlow nodes={nodes}
                       edges={edges}
                       onNodesChange={onNodesChange}
                       onEdgesChange={onEdgesChange}
                       onConnect={onConnect}
                       nodeTypes={nodeTypes}
            >
                <Background/>
                <Controls/>
            </ReactFlow>
        </div>
    )
}
