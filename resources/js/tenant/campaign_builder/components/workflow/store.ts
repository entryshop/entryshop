import {create} from 'zustand';
import {addEdge, applyEdgeChanges, applyNodeChanges} from '@xyflow/react';

import {AppState, nodeTypes} from './types';

const initialNodes = [
    {
        id: 'node-start',
        type: 'start',
        position: {x: 0, y: 0},
        data: {variables: []},
    },
    {
        id: 'node-1',
        type: 'textUpdater',
        position: {x: 100, y: 0},
        data: {value: "Hello world"},
    },
];

const initialEdges = [];

// this is our useStore hook that we can use in our components to get parts of the store and call actions
const useStore = create<AppState>((set, get) => ({
    nodes: initialNodes,
    edges: initialEdges,
    nodeTypes: nodeTypes,
    onNodesChange: (changes) => {
        set({
            nodes: applyNodeChanges(changes, get().nodes),
        });
    },
    onEdgesChange: (changes) => {
        set({
            edges: applyEdgeChanges(changes, get().edges),
        });
    },
    onConnect: (connection) => {
        set({
            edges: addEdge(connection, get().edges),
        });
    },
    setNodes: (nodes) => {
        set({nodes});
    },
    setEdges: (edges) => {
        set({edges});
    },
}));

export default useStore;
